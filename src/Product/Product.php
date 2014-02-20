<?php namespace Cart\Product;

class Product
{
    private $options = [];
    private $variants = [];

    public function getVariants()
    {
        return $this->variants;
    }

    public function addVariant(Variant $variant)
    {
        $this->variants[] = $variant;
    }

    public function getOptions()
    {
        return array_unique(array_merge($this->getBaseOptions(), $this->options));
    }

    public function addOption($option)
    {
        array_push($this->options, $option);
    }

    public function setOptions(array $options)
    {
        $this->options = array_merge($this->getOptions(), $options);
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
