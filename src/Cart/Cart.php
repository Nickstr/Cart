<?php namespace Cart\Cart;

use Cart\Core\Entity;

class Cart extends Entity
{
    public function items()
    {
        return $this->hasMany('Cart\Cart\Item');
    }
} 
