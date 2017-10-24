

PricingBundle
=============

https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/Repository/ProductPriceRepository.php
* The [`CurrencyProvider`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Provider/CurrencyProvider.php "Oro\Bundle\PricingBundle\Provider\CurrencyProvider") class has been removed.
* The following methods in [`ProductPriceCPLEntityListener`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/EntityListener/ProductPriceCPLEntityListener.php "Oro\Bundle\PricingBundle\Entity\EntityListener\ProductPriceCPLEntityListener") class have been removed:
   - `isPriceListToProductScheduled`
   - `prePersist`
   - `preRemove`
   - `preUpdate`
* The [`ProductPriceRepository::deleteGeneratedPricesByRule`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/Repository/ProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\ProductPriceRepository") method has been removed.
* The [`PriceListProductAssignmentBuilder::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Builder/PriceListProductAssignmentBuilder.php "Oro\Bundle\PricingBundle\Builder\PriceListProductAssignmentBuilder") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fifth argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fifth argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`ProductPriceBuilder::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Builder/ProductPriceBuilder.php "Oro\Bundle\PricingBundle\Builder\ProductPriceBuilder") method has been updated. Pass [`InsertFromSelectShardQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/ORM/InsertFromSelectShardQueryExecutor.php "Oro\Bundle\PricingBundle\ORM\InsertFromSelectShardQueryExecutor") as the second argument of the method instead of [`InsertFromSelectQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/EntityBundle/ORM/InsertFromSelectQueryExecutor.php "Oro\Bundle\EntityBundle\ORM\InsertFromSelectQueryExecutor"). Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fifth argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fifth argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`AjaxProductPriceController::updateAction`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Controller/AjaxProductPriceController.php "Oro\Bundle\PricingBundle\Controller\AjaxProductPriceController") method has been updated. Pass [`Request`](https://github.com/orocommerce/orocommerce/blob/master/src/Symfony/Component/HttpFoundation/Request.php "Symfony\Component\HttpFoundation\Request") as a first argument of the method instead of [`ProductPrice`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/ProductPrice.php "Oro\Bundle\PricingBundle\Entity\ProductPrice").
* The [`ProductPriceDuplicator::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Duplicator/ProductPriceDuplicator.php "Oro\Bundle\PricingBundle\Duplicator\ProductPriceDuplicator") method has been updated. Pass [`InsertFromSelectShardQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/ORM/InsertFromSelectShardQueryExecutor.php "Oro\Bundle\PricingBundle\ORM\InsertFromSelectShardQueryExecutor") as the second argument of the method instead of [`InsertFromSelectQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/EntityBundle/ORM/InsertFromSelectQueryExecutor.php "Oro\Bundle\EntityBundle\ORM\InsertFromSelectQueryExecutor").
* The [`PriceListToProductEntityListener::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/EntityListener/PriceListToProductEntityListener.php "Oro\Bundle\PricingBundle\Entity\EntityListener\PriceListToProductEntityListener") method  has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the third argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`BasePriceListRepository::getInvalidCurrenciesByPriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BasePriceListRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BasePriceListRepository")  method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList"). Pass [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList") as the second argument of the method. Pass [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`BaseProductPriceRepository::copyPrices`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`InsertFromSelectShardQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/ORM/InsertFromSelectShardQueryExecutor.php "Oro\Bundle\PricingBundle\ORM\InsertFromSelectShardQueryExecutor") as the third argument of the method instead of [`InsertFromSelectQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/EntityBundle/ORM/InsertFromSelectQueryExecutor.php "Oro\Bundle\EntityBundle\ORM\InsertFromSelectQueryExecutor").
* The [`BaseProductPriceRepository::countByPriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`PriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList"). Pass [`PriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList") as the second argument of the method. Pass [`PriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`BaseProductPriceRepository::deleteByPriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList"). Pass [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList") as the second argument of the method instead of [`Product`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product"). Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the third argument of the method. Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`BaseProductPriceRepository::deleteByProductUnit`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`Product`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product"). Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the second argument of the method instead of [`ProductUnit`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/ProductBundle/Entity/ProductUnit.php "Oro\Bundle\ProductBundle\Entity\ProductUnit"). Pass [`ProductUnit`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/ProductUnit.php "Oro\Bundle\ProductBundle\Entity\ProductUnit") as the third argument of the method. Pass [`ProductUnit`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/ProductUnit.php "Oro\Bundle\ProductBundle\Entity\ProductUnit") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`BaseProductPriceRepository::findByPriceListIdAndProductIds`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed"). Pass [`mixed`](https://github.com/orocommerce/orocommerce/blob/master/src/.php "mixed") as the seventh argument of the method.
* The [`BaseProductPriceRepository::getPricesBatch`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed"). Pass [`mixed`](https://github.com/orocommerce/orocommerce/blob/master/src/.php "mixed") as the fifth argument of the method.
* The [`BaseProductPriceRepository::getPricesByProduct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as a first argument of the method instead of [`Product`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product"). Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the second argument of the method. Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`BaseProductPriceRepository::getProductUnitsByPriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList"). Pass [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList") as the second argument of the method instead of [`Product`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product"). Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed"). Pass [`mixed`](https://github.com/orocommerce/orocommerce/blob/master/src/.php "mixed") as the fourth argument of the method.
* The [`BaseProductPriceRepository::getProductsUnitsByPriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/BaseProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\BaseProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList"). Pass [`BasePriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/BasePriceList.php "Oro\Bundle\PricingBundle\Entity\BasePriceList") as the second argument of the method instead of [`Collection`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Doctrine/Common/Collections/Collection.php "Doctrine\Common\Collections\Collection"). Pass [`Collection`](https://github.com/orocommerce/orocommerce/blob/master/src/Doctrine/Common/Collections/Collection.php "Doctrine\Common\Collections\Collection") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed"). Pass [`mixed`](https://github.com/orocommerce/orocommerce/blob/master/src/.php "mixed") as the fourth argument of the method.
* The [`CombinedProductPriceRepository::findByPriceListIdAndProductIds`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/CombinedProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\CombinedProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as a first argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed"). Pass [`mixed`](https://github.com/orocommerce/orocommerce/blob/master/src/.php "mixed") as a 7 argument of the method.
* The [`CombinedProductPriceRepository::insertPricesByPriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/CombinedProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\CombinedProductPriceRepository") method has been updated. Pass [`InsertFromSelectShardQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/ORM/InsertFromSelectShardQueryExecutor.php "Oro\Bundle\PricingBundle\ORM\InsertFromSelectShardQueryExecutor") as the first argument of the method instead of [`InsertFromSelectQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/EntityBundle/ORM/InsertFromSelectQueryExecutor.php "Oro\Bundle\EntityBundle\ORM\InsertFromSelectQueryExecutor").
* The [`PriceListToProductRepository::getProductsWithoutPrices`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/PriceListToProductRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\PriceListToProductRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`PriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList"). Pass [`PriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList") as the second argument of the method. Pass [`PriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`ProductPriceRepository::deleteGeneratedPrices`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/ProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\ProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`PriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList"). Pass [`PriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList") as the second argument of the method instead of [`Product`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product"). Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the third argument of the method. Pass [`Product`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/ProductBundle/Entity/Product.php "Oro\Bundle\ProductBundle\Entity\Product") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`ProductPriceRepository::deleteInvalidPrices`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/Repository/ProductPriceRepository.php "Oro\Bundle\PricingBundle\Entity\Repository\ProductPriceRepository") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the first argument of the method instead of [`PriceList`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList"). Pass [`PriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList") as the second argument of the method. Pass [`PriceList`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Entity/PriceList.php "Oro\Bundle\PricingBundle\Entity\PriceList") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`ProductPriceDatagridListener::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/EventListener/ProductPriceDatagridListener.php "Oro\Bundle\PricingBundle\EventListener\ProductPriceDatagridListener") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fourth argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fourth argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`ProductFormExtension::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Form/Extension/ProductFormExtension.php "Oro\Bundle\PricingBundle\Form\Extension\ProductFormExtension") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the second argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed"). Pass [`PriceManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Manager/PriceManager.php "Oro\Bundle\PricingBundle\Manager\PriceManager") as the third argument of the method. Pass [`PriceManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Manager/PriceManager.php "Oro\Bundle\PricingBundle\Manager\PriceManager") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`PriceListAdditionalProductPriceReader::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/ImportExport/Reader/PriceListAdditionalProductPriceReader.php "Oro\Bundle\PricingBundle\ImportExport\Reader\PriceListAdditionalProductPriceReader") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the third argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the third argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`FrontendProductPricesProvider::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Layout/DataProvider/FrontendProductPricesProvider.php "Oro\Bundle\PricingBundle\Layout\DataProvider\FrontendProductPricesProvider") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fifth argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the fifth argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`ProductPriceProvider::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Provider/ProductPriceProvider.php "Oro\Bundle\PricingBundle\Provider\ProductPriceProvider") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the second argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
* The [`CombinedProductPriceResolver::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Resolver/CombinedProductPriceResolver.php "Oro\Bundle\PricingBundle\Resolver\CombinedProductPriceResolver") method has been updated. Pass [`InsertFromSelectShardQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/ORM/InsertFromSelectShardQueryExecutor.php "Oro\Bundle\PricingBundle\ORM\InsertFromSelectShardQueryExecutor") as the second argument of the method instead of [`InsertFromSelectQueryExecutor`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/Oro/Bundle/EntityBundle/ORM/InsertFromSelectQueryExecutor.php "Oro\Bundle\EntityBundle\ORM\InsertFromSelectQueryExecutor").
* The [`PriceListProductPricesCurrencyValidator::__construct`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Validator/Constraints/PriceListProductPricesCurrencyValidator.php "Oro\Bundle\PricingBundle\Validator\Constraints\PriceListProductPricesCurrencyValidator") method has been updated. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the second argument of the method. Pass [`ShardManager`](https://github.com/orocommerce/orocommerce/blob/master/src/Oro/Bundle/PricingBundle/Sharding/ShardManager.php "Oro\Bundle\PricingBundle\Sharding\ShardManager") as the second argument of the method instead of [`mixed`](https://github.com/orocommerce/orocommerce/blob/1.1.0/src/mixed.php "mixed").
