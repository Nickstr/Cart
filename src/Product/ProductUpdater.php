<?php  namespace Cart\Product; 

class ProductUpdater
{
    public function addOption(Product $product, $option)
    {
        $product->addOption($option);
        $product->save();
    }

    public function addOptions(Product $product, $options)
    {
        foreach($options as $option) {
            $product->addOption($option);
        }

        $product->save();
    }
} 
