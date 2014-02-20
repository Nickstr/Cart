<?php  namespace Cart\Product; 

class VariantCreator
{
    private $variant;
    private $options;

    public function __construct(Variant $variant)
    {
        $this->variant = $variant;
    }

    public function create(Product $product, $values)
    {
        $this->createOptions($product, $values);

        $variant = new Variant;
        $variant->options = $this->getOptionsAsJson();

        return $product->variants()->save($variant);
    }

    private function getOptionsAsJson()
    {
        return json_encode($this->getOptions());
    }

    private function getOptions()
    {
        return $this->options;
    }

    private function createOptions($product, $values)
    {
        foreach($product->getOptions() as $option) {
            $this->options[$option] = array_get($values, $option);
        }
    }
} 
