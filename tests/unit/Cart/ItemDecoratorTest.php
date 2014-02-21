<?php namespace Cart;

use Cart\Cart\Item;
use Cart\Cart\ItemDecorator;
use Mockery;

class ItemDecoratorTest extends \TestCase
{
    public function testCanCreateItemDecorator()
    {
        $this->assertInstanceOf('Cart\Cart\ItemDecorator', $this->createItemDecorator());
    }

    public function testCanGetPrice()
    {
        $item = Mockery::mock('Cart\Cart\Item');
        $item->shouldReceive('getValues')->andReturn(['price' => '12.50']);

        $decoratedItem = $this->createItemDecorator($item);

        $this->assertEquals('12.50', $decoratedItem->getPrice());
    }

    public function testCanGetQuantity()
    {
        $item = Mockery::mock('Cart\Cart\Item');
        $item->shouldReceive('getValues')->andReturn(['quantity' => '5']);

        $decoratedItem = $this->createItemDecorator($item);

        $this->assertEquals('5', $decoratedItem->getQuantity());
    }

    public function testCanGetTotal()
    {
        $item = Mockery::mock('Cart\Cart\Item');
        $item->shouldReceive('getValues')->andReturn(['price' => '12.50', 'quantity' => '5']);
        $decoratedItem = $this->createItemDecorator($item);
        $this->assertEquals('62.50', $decoratedItem->getTotal());

        $item = Mockery::mock('Cart\Cart\Item');
        $item->shouldReceive('getValues')->andReturn(['price' => '13.33', 'quantity' => '5']);
        $decoratedItem = $this->createItemDecorator($item);
        $this->assertEquals('66.65', $decoratedItem->getTotal());
    }

    private function createItemDecorator($item = null)
    {
        if(! $item) {
            $item = new Item();
        }

        return new ItemDecorator($item);
    }
} 
