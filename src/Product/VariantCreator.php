<?php  namespace Cart\Product; 

class VariantCreator
{
    private $variant;
    private $attributes;

    public function __construct(Variant $variant)
    {
        $this->variant = $variant;
    }

    public function createVariant(Product $product, $values)
    {
        $this->createAttributes($product, $values);

        $variant = new Variant;
        $variant->setAttributes($this->attributes);

        return $variant;
    }

    private function createAttributes($product, $values)
    {
        foreach($product->getOptions() as $option) {
            $this->attributes[$option] = array_get($values, $option);
        }
    }
} 
