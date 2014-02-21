<?php namespace Product\Options;

use Cart\Product\Options\ProductOptionsFactory;
use Cart\Product\Product;
use Mockery;

class ProductOptionsFactoryTest extends \TestCase
{
    public function testCanCreateProductOptionsFactory()
    {
        $this->assertInstanceOf('Cart\Product\Options\ProductOptionsFactory', $this->createFactory());
    }

    public function testCanCreateOptions()
    {
        $product = Mockery::mock('Cart\Product\Product');
        $product->shouldReceive('getBaseOptions')->once()->andReturn(['foo', 'bar']);

        $factory = $this->createFactory($product);

        $options = $factory->create(['cat', 'dog']);
        $this->assertInstanceOf('Cart\Product\Options\Options', $options);
        $this->assertEquals($options->get(), ['foo', 'bar', 'cat', 'dog']);
    }

    public function testCanUpdateOptions()
    {
        $product = Mockery::mock('Cart\Product\Product');
        $product->shouldReceive('getOptions')->once()->andReturn(['foo', 'bar', 'cat']);

        $factory = $this->createFactory($product);

        $options = $factory->update($product, ['cat', 'dog']);
        $expectedOptions = ['foo', 'bar', 'cat', 'dog'];

        $this->assertInstanceOf('Cart\Product\Options\Options', $options);
        $this->assertEquals(count($options->get()), count($expectedOptions));
        $this->assertEquals(last($options->get()), last($expectedOptions));
    }

    private function createFactory($product = null)
    {
        if(! $product) {
            $product = new Product;
        }
        return new ProductOptionsFactory($product);
    }
} 
