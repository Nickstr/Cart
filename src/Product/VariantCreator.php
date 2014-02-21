<?php  namespace Cart\Product; 

use Cart\Product\Options\VariantOptionsFactory;

class VariantCreator
{
    public function __construct(VariantOptionsFactory $options, Variant $variant)
    {
        $this->optionsFactory = $options;
        $this->variant = $variant;
    }

    public function create(Product $product, $values)
    {
        $options = $this->optionsFactory->create($product, $values);

        $variant = $this->variant->newInstance();
        $variant->setOptions($options);
        $product->variants()->save($variant);
    }
} 
