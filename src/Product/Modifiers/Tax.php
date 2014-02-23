<?php  namespace Cart\Product\Modifiers; 

use Cart\Product\Variant;

class Tax extends Modifier
{
    public function run(Variant $variant)
    {
        $tax = '1.' . $this->getValue();
        return round($variant->getPrice() * $tax, 2);
    }
} 
