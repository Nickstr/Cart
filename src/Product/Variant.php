<?php namespace Cart\Product;

use Cart\Core\Entity;
use Cart\Product\Options\Options;

class Variant extends Entity
{
    public function product()
    {
        return $this->belongsTo('Cart\Product\Product');
    }

    public function decorate()
    {
        return new VariantDecorator($this);
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function inStock()
    {
        if($this->getOptions()['quantity'] > 0) return true;
    }

    public function getOptions()
    {
        return (array) json_decode($this->options);
    }

    public function getOptionsAsJson()
    {
        return $this->options;
    }

    public function setOptions(Options $options)
    {
        $this->options = $options->toJson();
    }

    public function hasModifiers()
    {
        return $this->modifiers;
    }

    public function getPrice()
    {
        return $this->getOptions()['price'];
    }


} 
