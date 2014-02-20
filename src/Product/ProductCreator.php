<?php  namespace Cart\Product; 

class ProductCreator
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create()
    {
        return new Product;
    }
} 
