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

    private function getOptions()
    {
        $variants = $this->product->getInStockVariants();

        foreach($variants as $variant) {
            $attributes = $variant->getAttributes();

            foreach($attributes as $attribute => $value) {
                $this->options[$attribute][] = $value;
                $this->options[$attribute] = array_unique($this->options[$attribute]);
            }
        }

        return $this->options;
    }
} 
