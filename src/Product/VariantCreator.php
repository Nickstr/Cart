<?php  namespace Cart\Product; 

use Cart\Product\Options\VariantOptionsFactory;

class VariantCreator
{
    public function __construct(VariantOptionsFactory $options)
    {
        $this->optionsFactory = $options;
    }

    public function create(Product $product, $values)
    {
        $options = $this->optionsFactory->create($product, $values);

        $variant = new Variant;
        $variant->setOptions($options);
        $product->variants()->save($variant);
    }
} 
