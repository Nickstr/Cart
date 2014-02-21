<?php  namespace Cart\Product; 

class VariantCreator
{
    public function create(Product $product, $values)
    {
        $this->createOptions($product, $values);

        $variant = new Variant;
        $variant->options = $this->getOptionsAsJson();
        $product->variants()->save($variant);
    }

    private function getOptionsAsJson()
    {
        return json_encode($this->options);
    }

    private function createOptions($product, $values)
    {
        foreach($product->getOptions() as $option) {
            $this->options[$option] = array_get($values, $option);
        }
    }
} 
