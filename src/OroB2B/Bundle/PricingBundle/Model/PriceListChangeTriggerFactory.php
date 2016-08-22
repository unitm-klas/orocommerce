<?php

namespace OroB2B\Bundle\PricingBundle\Model;

use Doctrine\Common\Persistence\ManagerRegistry;
use Oro\Component\MessageQueue\Transport\MessageInterface;
use OroB2B\Bundle\AccountBundle\Entity\Account;
use OroB2B\Bundle\AccountBundle\Entity\AccountGroup;
use OroB2B\Bundle\PricingBundle\Model\DTO\PriceListChangeTrigger;
use OroB2B\Bundle\WebsiteBundle\Entity\Website;

class PriceListChangeTriggerFactory
{
    /**
     * @var ManagerRegistry
     */
    protected $registry;

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @return PriceListChangeTrigger
     */
    public function create()
    {
        return new PriceListChangeTrigger();
    }

    /**
     * @param MessageInterface $message
     * @return PriceListChangeTrigger
     */
    public function createFromMessage(MessageInterface $message)
    {
        $data = $message->getBody() ? json_decode($message->getBody(), true) : [];
        $data = $this->normalizeArrayData($data);

        $priceListChangeTrigger = new PriceListChangeTrigger();
        if ($data[PriceListChangeTrigger::ACCOUNT]) {
            $account = $this->registry->getRepository(Account::class)
                ->find($data[PriceListChangeTrigger::ACCOUNT]);
            $priceListChangeTrigger->setAccount($account);
        }
        if ($data[PriceListChangeTrigger::ACCOUNT_GROUP]) {
            $accountGroup = $this->registry->getRepository(AccountGroup::class)
                ->find($data[PriceListChangeTrigger::ACCOUNT_GROUP]);
            $priceListChangeTrigger->setAccountGroup($accountGroup);
        }
        if ($data[PriceListChangeTrigger::WEBSITE]) {
            $website = $this->registry->getRepository(Website::class)
                ->find($data[PriceListChangeTrigger::WEBSITE]);
            $priceListChangeTrigger->setWebsite($website);
        }

        return $priceListChangeTrigger;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function normalizeArrayData(array $data)
    {
        return array_replace(
            [
                PriceListChangeTrigger::ACCOUNT => null,
                PriceListChangeTrigger::ACCOUNT_GROUP => null,
                PriceListChangeTrigger::WEBSITE => null,
                PriceListChangeTrigger::FORCE => false,
            ],
            $data
        );
    }
}
