<?php  namespace Cart\Product\Options; 

use Cart\Product\Product;

class ProductOptionsFactory
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create($options)
    {
        return new Options($this->getUnique($this->product->getBaseOptions(), $options));
    }

    public function update(Product $product, $options)
    {
        return new Options($this->getUnique($product->getOptions(), $options));
    }

    private function getUnique($productOptions, $options)
    {
        return array_unique(array_merge($productOptions, $options));
    }
} 
