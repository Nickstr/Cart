<?php  namespace Cart\Product; 

use Cart\Product\Options\ProductOptionsFactory;

class ProductCreator
{
    public function __construct(ProductOptionsFactory $options, Product $product)
    {
        $this->optionsFactory = $options;
        $this->product = $product;
    }

    public function create($options)
    {
        $options = $this->optionsFactory->create($options);

        $product = $this->product->newInstance();
        $product->setOptions($options);
        $product->save();

        return $product;
    }
} 
