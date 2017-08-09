<?php

namespace Oro\Bundle\FedexShippingBundle\Tests\Unit\DependencyInjection;

use Oro\Bundle\FedexShippingBundle\DependencyInjection\OroFedexShippingExtension;
use Oro\Bundle\TestFrameworkBundle\Test\DependencyInjection\ExtensionTestCase;

class OroFedexShippingExtensionTest extends ExtensionTestCase
{
    /**
     * @var OroFedexShippingExtension
     */
    private $extension;

    protected function setUp()
    {
        $this->extension = new OroFedexShippingExtension();
    }

    public function testLoad()
    {
        $this->loadExtension($this->extension);

        $expectedDefinitions = [
            'oro_fedex_shipping.integration.channel',
            'oro_fedex_shipping.integration.transport',
        ];

        $this->assertDefinitionsLoaded($expectedDefinitions);

        $expectedParameters = [
            'oro_fedex_shipping.integration.channel.type',
            'oro_fedex_shipping.integration.transport.type',
        ];

        $this->assertParametersLoaded($expectedParameters);
    }

    public function testGetAlias()
    {
        static::assertSame('oro_fedex_shipping', $this->extension->getAlias());
    }
}
