<?php namespace Cart\Product\Options;

use Cart\Product\Product;
use Cart\Product\Variant;

class VariantOptionsFactory
{
    public function __construct(Variant $variant)
    {
        $this->variant = $variant;
    }

    public function create(Product $product, $options)
    {
        $options = $this->createOptions($product, $options);
        return new Options($options);
    }

    public function update(Variant $variant, $options)
    {
        $options = $this->updateOptions($variant, $options);
        return new Options($options);
    }

    private function createOptions(Product $product, $values)
    {
        $variantOptions = [];
        $productOptions = $product->getOptions();

        foreach($productOptions as $option) {
            if ($this->productHasOption($values, $option)) {
                $variantOptions[$option] = array_get($values, $option);
            }
        }

        return array_unique($variantOptions);
    }

    private function updateOptions(Variant $variant, $options)
    {
        $currentOptions = $variant->getOptions();
        return array_unique(array_merge($currentOptions, $options));
    }

    private function productHasOption($values, $option)
    {
        return array_key_exists($option, $values);
    }
} 
