<?php  namespace Cart\Product; 

class ProductGetter
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function get($id)
    {
        return $this->product->where('id', '=', $id)->first();
    }
} 
