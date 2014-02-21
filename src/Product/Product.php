<?php namespace Cart\Product;

use Cart\Core\Entity;

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
        return (array) json_decode($this->options);
    }

    public function addOption($option)
    {
        $options = $this->getOptions();
        $options[] = $option;

        $this->setOptions($options);
    }

    public function setOptions(array $options)
    {
        $options = array_merge($this->getOptions(), $options);
        $this->options = json_encode(array_unique($options));
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
