<?php  namespace Cart\Cart; 

class CartRenderer
{
    private $items;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getItems()
    {
        foreach($this->cart->items as $item) {
            $this->items[] = $item->decorate();
        }
    }
} 
