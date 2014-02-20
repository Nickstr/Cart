<?php  namespace Cart\Product; 

class ProductRenderer
{
    private $product;
    private $options;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function renderOptions()
    {
        return $this->getOptions();
    }

    public function renderOption($option)
    {
        $options = $this->getOptions();
        return $options[$option];
    }

    private function getOptions()
    {
        $variants = $this->product->getInStockVariants();

        foreach($variants as $variant) {
            $attributes = $variant->getOptions();

            foreach($attributes as $attribute => $value) {
                $this->options[$attribute][] = $value;
                $this->options[$attribute] = array_unique($this->options[$attribute]);
            }
        }

        return $this->options;
    }
} 
