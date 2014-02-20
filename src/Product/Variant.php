<?php namespace Cart\Product;

class Variant
{
    private $attributes;

    public function create(array $options, array $values)
    {
        $this->attributes = array_combine($options, $values);
        return $this;
    }

    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function inStock()
    {
        if($this->attributes['quantity'] > 0) return true;
    }
} 
