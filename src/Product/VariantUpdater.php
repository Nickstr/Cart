<?php  namespace Cart\Product; 

use Cart\Product\Options\VariantOptionsFactory;

class VariantUpdater
{
    public function __construct(VariantOptionsFactory $options)
    {
        $this->optionsFactory = $options;
    }

    public function update(Variant $variant, array $values)
    {
        $variant->setOptions($this->optionsFactory->update($variant, $values));
        $variant->save();
    }
} 
