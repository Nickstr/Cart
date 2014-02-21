<?php namespace Cart\Product;

use Cart\Product\Options\ProductOptionsFactory;

class ProductUpdater
{
    public function __construct(ProductOptionsFactory $options)
    {
        $this->optionsFactory = $options;
    }

    public function addOptions(Product $product, $options)
    {
        $product->setOptions($this->optionsFactory->update($product, $options));
        $product->save();
    }
} 
