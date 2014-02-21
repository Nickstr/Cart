<?php namespace Cart\Product;

use Cart\Core\Entity;
use Cart\Product\Options\Options;

class Product extends Entity
{
    protected $with = ['variants'];
    public $baseOptions = ['price', 'quantity'];

    public function variants()
    {
        return $this->hasMany('Cart\Product\Variant');
    }

    public function getVariants()
    {
        return $this->variants;
    }

    public function getOptions()
    {
        $options = (array) json_decode($this->options);
        return $options;
    }

    public function setOptions(Options $options)
    {
        $this->options = $options->toJson();
    }

    public function getInStockVariants()
    {
        $variants = [];

        foreach($this->variants as $variant) {
            if($variant->inStock()) {
                $variants[] = $variant;
            }
        }

        return $variants;
    }
} 
