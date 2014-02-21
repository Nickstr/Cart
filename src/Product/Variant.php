<?php namespace Cart\Product;

use Cart\Core\Entity;

class Variant extends Entity
{
    public function product()
    {
        return $this->belongsTo('Cart\Product\Product');
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function inStock()
    {
        if($this->getOptions()->quantity > 0) return true;
    }

    public function getOptions()
    {
        return (array) json_decode($this->options);
    }

    public function getOptionsAsJson()
    {
        return $this->options;
    }

    public function setOptions(array $options)
    {
        $this->options = json_encode($options);
    }

} 
