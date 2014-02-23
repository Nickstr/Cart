<?php  namespace Cart\Product; 

class VariantDecorator
{
    public function __construct(Variant $variant)
    {
        $this->variant = $variant;
        $this->runModifiers();
    }

    public function getSubtotal()
    {
        return $this->price;
    }

    public function runModifiers()
    {
        if(! $this->variant->hasModifiers()) return;

        foreach($this->variant->getModifiers() as $modifier) {
            $modifierObject = new $modifier['type'];
            $modifierObject->hydrateValues($modifier);
            $this->$modifier['target'] = $modifierObject->run($this->variant);
        }
    }
} 
