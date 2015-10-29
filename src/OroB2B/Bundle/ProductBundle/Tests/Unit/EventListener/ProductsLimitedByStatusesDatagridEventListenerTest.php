<?php

namespace OroB2B\Bundle\ProductBundle\Tests\Unit\EventListener;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

use Doctrine\ORM\QueryBuilder;

use Oro\Bundle\DataGridBundle\Datagrid\DatagridInterface;
use Oro\Bundle\DataGridBundle\Datasource\Orm\OrmDatasource;
use Oro\Bundle\DataGridBundle\Event\BuildAfter;

use OroB2B\Bundle\ProductBundle\Event\ProductSelectQueryDbEvent;
use OroB2B\Bundle\ProductBundle\EventListener\ProductsLimitedByStatusesDatagridEventListener;
use OroB2B\Bundle\ProductBundle\Form\Type\ProductSelectType;

class ProductsLimitedByStatusesDatagridEventListenerTest extends \PHPUnit_Framework_TestCase
{

    /** @var  Request|\PHPUnit_Framework_MockObject_MockObject */
    protected $request;

    /** @var  EventDispatcherInterface|\PHPUnit_Framework_MockObject_MockObject */
    protected $eventDispatcher;

    /** @var QueryBuilder|\PHPUnit_Framework_MockObject_MockObject $qb */
    protected $qb;

    /**
     * @dataProvider testOnBuildAfterDataProvider
     * @param Request|null $request
     * @param array $expectedParamsResult
     */
    public function testOnBuildAfter($request, array $expectedParamsResult)
    {
        $this->request = $request;
        $listener = $this->createListener();
        $event = $this->createEvent();
        $this->eventDispatcher->expects($this->once())->method('dispatch')->with(
            ProductSelectQueryDbEvent::NAME,
            new ProductSelectQueryDbEvent($this->qb, $expectedParamsResult)
        );
        $listener->onBuildAfter($event);
    }

    public function testOnBuildAfterDataProvider()
    {
        $emptyParamsRequest = new Request();
        $emptyParamsRequest->request->set(ProductSelectType::DATA_PARAMETERS, []);
        $params = ['some' => 'param'];
        $notEmptyParamsRequest = new Request();
        $notEmptyParamsRequest->request->set(ProductSelectType::DATA_PARAMETERS, $params);

        return
            [
                'withoutRequest' => ['request' => null, 'expectedParamsResult' => []],
                'withoutParams' => ['request' => new Request(), 'expectedParamsResult' => []],
                'withEmptyParams' => ['request' => $emptyParamsRequest, 'expectedParamsResult' => []],
                'withNotEmptyParams' => ['request' => $notEmptyParamsRequest, 'expectedParamsResult' => $params],
            ];
    }

    /**
     * @return BuildAfter
     */
    protected function createEvent()
    {
        $this->qb = $this->getMockBuilder('Doctrine\ORM\QueryBuilder')->disableOriginalConstructor()->getMock();
        /** @var OrmDatasource|\PHPUnit_Framework_MockObject_MockObject $dataSource */
        $dataSource = $this->getMockBuilder('Oro\Bundle\DataGridBundle\Datasource\Orm\OrmDatasource')
            ->disableOriginalConstructor()
            ->getMock();
        $dataSource->expects($this->once())->method('getQueryBuilder')->willReturn($this->qb);
        /** @var DatagridInterface|\PHPUnit_Framework_MockObject_MockObject $dataGrid */
        $dataGrid = $this->getMock('Oro\Bundle\DataGridBundle\Datagrid\DatagridInterface');
        $dataGrid->expects($this->once())->method('getAcceptedDatasource')->willReturn($dataSource);

        return new BuildAfter($dataGrid);
    }

    /**
     * @return ProductsLimitedByStatusesDatagridEventListener
     */
    protected function createListener()
    {
        /** @var RequestStack|\PHPUnit_Framework_MockObject_MockObject $requestStack */
        $requestStack = $this->getMock('Symfony\Component\HttpFoundation\RequestStack');
        $requestStack->expects($this->once())->method('getCurrentRequest')->willReturn($this->request);
        $this->eventDispatcher = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcherInterface');

        return new ProductsLimitedByStatusesDatagridEventListener($requestStack, $this->eventDispatcher);
    }
}
