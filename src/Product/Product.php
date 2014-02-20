<?php namespace Cart\Product;

use Cart\Core\Entity;

class Product extends Entity
{
    private $options;

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
        $baseOptions = $this->getBaseOptions();
        $savedOptions = json_decode($this->options) ? json_decode($this->options) : array();

        return array_unique(array_merge($baseOptions, $savedOptions));
    }

    public function addOption($option)
    {
        $this->options = array_push($this->options, $option);
        $this->save();
    }

    public function setOptions(array $options)
    {
        $this->options = json_encode(array_merge($this->getOptions(), $options));
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

    // Private
    private function getBaseOptions()
    {
        return ['price', 'quantity'];
    }
} 
