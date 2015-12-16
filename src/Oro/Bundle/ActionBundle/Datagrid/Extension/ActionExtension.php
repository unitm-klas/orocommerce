<?php

namespace Oro\Bundle\ActionBundle\Datagrid\Extension;

use Oro\Bundle\ActionBundle\Model\Action;
use Oro\Bundle\ActionBundle\Model\ActionManager;
use Oro\Bundle\ActionBundle\Model\ContextHelper;
use Oro\Bundle\DataGridBundle\Datagrid\Common\DatagridConfiguration;
use Oro\Bundle\DataGridBundle\Datagrid\Common\ResultsObject;
use Oro\Bundle\DataGridBundle\Datasource\ResultRecord;
use Oro\Bundle\DataGridBundle\Datasource\ResultRecordInterface;
use Oro\Bundle\DataGridBundle\Extension\AbstractExtension;

class ActionExtension extends AbstractExtension
{
    /** @var ActionManager */
    protected $actionManager;

    /** @var ContextHelper */
    protected $contextHelper;

    /** @var array */
    protected $actionConfiguration = [];

    /**
     * @param ActionManager $actionManager
     * @param ContextHelper $contextHelper
     */
    public function __construct(
        ActionManager $actionManager,
        ContextHelper $contextHelper
    ) {
        $this->actionManager = $actionManager;
        $this->contextHelper = $contextHelper;
    }

    /**
     * {@inheritDoc}
     */
    public function isApplicable(DatagridConfiguration $config)
    {
        $context = $this->getContext($config);
        $actions = $this->actionManager->getActions($context);
        if (0 === count($actions)) {
            return false;
        }
        $this->processActionsConfig($config, $actions, $context);

        $this->actionConfiguration = $config->offsetGetOr('action_configuration', []);
        $config->offsetSet('action_configuration', [$this, 'getActionsPermissions']);

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function visitResult(DatagridConfiguration $config, ResultsObject $result)
    {
        $context = $this->getContext($config);
        $actions = $this->actionManager->getActions($context);
        if (0 === count($actions)) {
            return;
        }
        /** @var ResultRecord[] $rows */
        $rows = $result->offsetGetByPath('[data]');
        $rows = is_array($rows) ? $rows : [];
        foreach ($rows as &$record) {
            $context = [
                'entityId' => $record->getValue('id'),
                'entityClass' => $context['entityClass'],
            ];
            $actionData = $this->contextHelper->getActionData($context);
            $actionsList = [];
            foreach ($actions as $action) {
                $actionsList[$action->getName()] = $action->isAllowed($actionData);
            }
            $record->addData(['actions' => $actionsList]);
        }
        unset($record);

        $result->offsetSet('data', $rows);
    }

    /**
     * @param ResultRecordInterface $record
     *
     * @return array
     */
    public function getActionsPermissions(ResultRecordInterface $record)
    {
        $actionsOld = [];
        // process own permissions of the datagrid
        if ($this->actionConfiguration && is_callable($this->actionConfiguration)) {
            $actionsOld = call_user_func($this->actionConfiguration, $record);

            $actionsOld = is_array($actionsOld) ? $actionsOld : [];
        };
        $actionsNew = $record->getValue('actions');
        $actionsNew = is_array($actionsNew) ? $actionsNew : [];

        return array_merge($actionsOld, $actionsNew);
    }

    /**
     * @param DatagridConfiguration $config
     * @param Action[] $actions
     * @param array $context
     */
    protected function processActionsConfig(DatagridConfiguration $config, array $actions, array $context)
    {
        $actionsConfig = $config->offsetGetOr('actions', []);

        foreach ($actions as $action) {
            $frontendOptions = $action->getDefinition()->getFrontendOptions();
            $actionsConfig[$action->getName()] = [
                'type' => 'action-widget',
                'label' => $action->getDefinition()->getLabel(),
                'rowAction' => false,
                'link' => '#',
                'icon' => !empty($frontendOptions['icon'])
                    ? str_ireplace('icon-', '', $frontendOptions['icon'])
                    : 'edit',
                'options' => [
                    'actionName' => $action->getName(),
                    'entityClass' => $context['entityClass'],
                    'datagrid' => $context['datagrid'],
                    'datagridConfirm' =>  !empty($frontendOptions['datagrid_confirm'])
                        ? $frontendOptions['datagrid_confirm']
                        : '',
                    'showDialog' => $action->hasForm(),
                    'dialogOptions' => [
                        'title' => $action->getDefinition()->getLabel(),
                        'dialogOptions' => !empty($frontendOptions['dialog_options'])
                            ? $frontendOptions['dialog_options']
                            : [],
                    ]
                ]
            ];
        }

        $config->offsetSet('actions', $actionsConfig);
    }

    /**
     * @param DatagridConfiguration $config
     *
     * @return array
     */
    protected function getContext(DatagridConfiguration $config)
    {
        return [
            'entityClass' => $config->offsetGetByPath('[extended_entity_name]'),
            'datagrid' => $config->offsetGetByPath('[name]')
        ];
    }
}
