<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusVueStorefrontPlugin\Elasticsearch\Transformer;

use BitBag\SyliusVueStorefrontPlugin\Elasticsearch\Transformer\ProductAttributeToVueStorefrontDocumentTransformer;
use BitBag\SyliusVueStorefrontPlugin\Sylius\Transformer\SyliusProductAttributeTransformerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductAttributeInterface;
use BitBag\SyliusVueStorefrontPlugin\Document\Attribute;

final class ProductAttributeToVueStorefrontDocumentTransformerSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductAttributeToVueStorefrontDocumentTransformer::class);
    }

    function let(SyliusProductAttributeTransformerInterface $syliusProductAttributeTransformer): void
    {
        $this->beConstructedWith($syliusProductAttributeTransformer);
    }

    function it_transforms(
        SyliusProductAttributeTransformerInterface $syliusProductAttributeTransformer,
        ProductAttributeInterface $syliusProductAttribute
    ): void {
        $attribute = new Attribute(
            1,
            1,
            1,
            'example-code',
            0,
            [],
            true,
            true,
            true,
            true,
            true,
            'example-input',
            'example-label'
        );

        $syliusProductAttributeTransformer->transform($syliusProductAttribute)->willReturn($attribute);

        $this->transform($syliusProductAttribute, []);
    }
}
