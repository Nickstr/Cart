<?php  namespace Cart\Product; 

class VariantUpdater
{
    public function update(Variant $variant, array $values)
    {
        $variant->setOptions($this->createOptions($variant, $values));
        $variant->save();
    }

    private function createOptions(Variant $variant, $values)
    {
        $currentOptions = $variant->getOptions();
        $options = [];
        
        foreach($variant->product->getOptions() as $option) {
            if(in_array($option, $values)) {
                $options[$option] = array_get($values, $option);
            }
        }

        return array_merge($currentOptions, $options);
    }
} 
