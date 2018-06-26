<?php

namespace Oro\Bundle\ProductBundle\Tests\Unit\Form\Extension;

use Oro\Bundle\ProductBundle\Entity\Product;
use Oro\Bundle\ProductBundle\Entity\ProductUnit;
use Oro\Bundle\ProductBundle\Form\Extension\ChoicesProductPrimaryUnitSelectionOwnerTypeExtension;
use Oro\Bundle\ProductBundle\Form\Type\ProductUnitSelectType;
use Oro\Bundle\ProductBundle\Formatter\ProductUnitLabelFormatter;
use Oro\Bundle\ProductBundle\Visibility\ProductUnitFieldsSettingsInterface;
use Oro\Component\Testing\Unit\FormIntegrationTestCase;
use Oro\Component\Testing\Unit\PreloadedExtension;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoicesProductPrimaryUnitSelectionOwnerTypeExtensionTest extends FormIntegrationTestCase
{
    /**
     * @var string|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $childName;

    /**
     * @var string|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $extendedType;

    /**
     * @var ProductUnitFieldsSettingsInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productFormUnitFieldsSettings;

    /**
     * @var ChoicesProductPrimaryUnitSelectionOwnerTypeExtension
     */
    protected $choicesProductPrimaryUnitSelectionOwnerTypeExtension;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->childName = 'testChild';
        $this->productFormUnitFieldsSettings = $this->createMock(ProductUnitFieldsSettingsInterface::class);
        $this->choicesProductPrimaryUnitSelectionOwnerTypeExtension =
            new ChoicesProductPrimaryUnitSelectionOwnerTypeExtension(
                $this->childName,
                $this->extendedType,
                $this->productFormUnitFieldsSettings
            );
        parent::setUp();
    }

    public function testBuildForm()
    {
        /** @var FormBuilderInterface|\PHPUnit\Framework\MockObject\MockObject $builder */
        $builder = $this->createMock(FormBuilderInterface::class);
        $builder->expects($this->once())
            ->method('addEventListener');

        $this->choicesProductPrimaryUnitSelectionOwnerTypeExtension->buildForm($builder, []);
    }

    public function testBuildFormIntegration()
    {
        $choices = ['choice1', 'choice2'];
        $this->productFormUnitFieldsSettings
            ->method('getAvailablePrimaryUnitChoices')
            ->willReturn($choices);
        $formBuilder = $this->factory->createNamedBuilder('test');
        $formBuilder->add($this->childName, ProductUnitSelectType::class, $this->getDefaultOptions());
        $this->choicesProductPrimaryUnitSelectionOwnerTypeExtension->buildForm(
            $formBuilder,
            []
        );
        $form = $formBuilder->getForm();
        $form->setData([$this->childName => 'unit']);
        $options = $form->get($this->childName)->getConfig()->getOptions();
        $this->assertArrayHasKey('choices', $options);
        $this->assertSame($choices, $options['choices']);
    }

    public function testSetAvailableUnitsThrowsException()
    {
        /** @var FormEvent|\PHPUnit\Framework\MockObject\MockObject $event * */
        $event = $this->getMockBuilder(FormEvent::class)
            ->disableOriginalConstructor()
            ->getMock();
        $form = $this->createMock(FormInterface::class);
        $event->method('getForm')->willReturn($form);
        $this->expectException(\InvalidArgumentException::class);

        $this->choicesProductPrimaryUnitSelectionOwnerTypeExtension->setAvailableUnits($event);
    }

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            'product_field' => 'test',
            'product' => $this->createMock(Product::class),
            'class' => ProductUnit::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtensions()
    {
        $formatter = $this->createMock(ProductUnitLabelFormatter::class);
        $productUnitSelectType = new ProductUnitSelectType($formatter);
        $type = $this->createMock(FormTypeInterface::class);
        $type->method('getBlockPrefix')->willReturn('entity');
        $type->method('configureOptions')->willReturnCallback(
            function (OptionsResolver $resolver) {
                $resolver->setDefined(['auto_initialize', 'choice_loader', 'choices']);
            }
        );

        return [
            new PreloadedExtension(
                [
                    ProductUnitSelectType::class => $productUnitSelectType,
                    EntityType::class => $type,
                ],
                []
            ),
            $this->getValidatorExtension(true),
        ];
    }
}
