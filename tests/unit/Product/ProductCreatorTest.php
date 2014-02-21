<?php  namespace Product; 

use Cart\Product\Options\ProductOptionsFactory;
use Cart\Product\Product;
use Cart\Product\ProductCreator;
use Mockery;

class ProductCreatorTest extends \TestCase
{
    public function testCanCreateProductCreator()
    {
        $this->assertInstanceOf('Cart\Product\ProductCreator', $this->createCreator());
    }


    private function createCreator($productOptionsFactory = null, $product = null)
    {
        if(! $product) {
            $product = new Product;
        }

        if(! $productOptionsFactory) {
            $productOptionsFactory = new ProductOptionsFactory($product);
        }

        return new ProductCreator($productOptionsFactory, $product);
    }
} 
