<?php  namespace Cart\Product; 

class ProductCreator
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create($options)
    {
        $options = $this->createOptions($options);

        $product = new Product;
        $product->setOptions($options);
        $product->save();

        return $product;
    }

    private function createOptions($options)
    {
        $baseOptions = $this->product->baseOptions;
        $mergedArray = array_merge($options, $baseOptions);
        return array_unique($mergedArray);
    }
} 
