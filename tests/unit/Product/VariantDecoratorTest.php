<?php  namespace Product;

use Cart\Product\Variant;
use Cart\Product\VariantDecorator;
use Mockery;

class VariantDecoratorTest extends \Testcase
{
    public function testCanCreateItemDecorator()
    {
        $this->assertInstanceOf('Cart\Product\VariantDecorator', $this->createVariantDecorator());
    }

    public function testCanAddTax()
    {
        $modifiers = [
          [
              'type'   => 'Cart\Product\Modifiers\Tax',
              'target'   => 'price',
              'value'   => '21'
          ],
        ];

        $variant = Mockery::mock('Cart\Product\Variant');
        $variant->shouldReceive('hasModifiers')->andReturn(true);
        $variant->shouldReceive('getModifiers')->andReturn($modifiers);
        $variant->shouldReceive('getPrice')->andReturn('19.95');

        $decorator = $this->createVariantDecorator($variant);

        $this->assertEquals('24.14', $decorator->getSubtotal());
    }

    private function createVariantDecorator($variant = null)
    {
        if(! $variant) {
            $variant = Mockery::mock('Cart\Product\Variant');
            $variant->shouldReceive('hasModifiers')->andReturn(false);
        }

        return new VariantDecorator($variant);
    }
} 
