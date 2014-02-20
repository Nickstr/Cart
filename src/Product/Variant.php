<?php namespace Cart\Product;

use Cart\Core\Entity;

class Variant extends Entity
{
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
        return json_decode($this->options);
    }

    private function getOptionsAsJson()
    {
        return $this->options;
    }

} 
