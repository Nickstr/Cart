<?php namespace Cart\Categories;

use Cart\Core\Entity;

class Category extends Entity
{
    public function products()
    {
        return $this->hasMany('Cart\Products\Product');
    }
} 
