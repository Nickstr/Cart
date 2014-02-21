<?php  namespace Product\Options;

use Cart\Product\Options\VariantOptionsFactory;
use Cart\Product\Variant;
use Mockery;

class VariantOptionsFactoryTest extends \TestCase
{
    public function testCanCreateVariantOptionsFactory()
    {
        $this->assertInstanceOf('Cart\Product\Options\VariantOptionsFactory', $this->createFactory());
    }

    public function testCanCreateOptions()
    {
        $inputOptions = ['cat' => 'meow', 'dog' => 'woof', 'fish' => 'blub'];

        $product = Mockery::mock('Cart\Product\Product');
        $product->shouldReceive('getOptions')->andReturn(['cat', 'dog', 'fish']);

        $factory = $this->createFactory();
        $options = $factory->create($product, $inputOptions);

        $this->assertInstanceOf('Cart\Product\Options\Options', $options);
        $this->assertEquals($options->get(), $inputOptions);
    }

    public function testCannotSetUnexistingOptions()
    {
        $inputOptions = ['cat' => 'meow', 'dog' => 'woof', 'fish' => 'blub'];

        $product = Mockery::mock('Cart\Product\Product');
        $product->shouldReceive('getOptions')->andReturn(['cat', 'dog']);

        $factory = $this->createFactory();
        $options = $factory->create($product, $inputOptions);

        $this->assertInstanceOf('Cart\Product\Options\Options', $options);
        $this->assertNotEquals($options->get(), $inputOptions);
        $this->assertEquals(2, count($options->get()));
    }

    public function testCanUpdateOptionValues()
    {
        $inputOptions = ['cat' => 'woof', 'dog' => 'meow'];

        $product = Mockery::mock('Cart\Product\Product');
        $product->shouldReceive('getOptions')->andReturn(['cat', 'dog']);

        $variant = Mockery::mock('Cart\Product\Variant');
        $variant->shouldReceive('getOptions')->andReturn(['cat' => 'meow', 'dog' => 'woof']);

        $factory = $this->createFactory();
        $options = $factory->update($variant, $inputOptions);

        $this->assertInstanceOf('Cart\Product\Options\Options', $options);
        $this->assertEquals($options->get(), $inputOptions);
        $this->assertEquals(2, count($options->get()));
    }

    private function createFactory($variant = null)
    {
        if (!$variant) {
            $variant = new Variant;
        }
        return new VariantOptionsFactory($variant);
    }
}
