<?php  namespace Cart\Product; 

use Cart\Product\Options\ProductOptionsFactory;

class ProductCreator
{
    public function __construct(ProductOptionsFactory $options)
    {
        $this->optionsFactory = $options;
    }

    public function create($options)
    {
        $options = $this->optionsFactory->create($options);

        $product = new Product;
        $product->setOptions($options);
        $product->save();

        return $product;
    }
} 
