<?php  namespace Cart\Cart; 

class ItemDecorator
{
    private $options;

    public function __construct(Item $item)
    {
        $this->item = $item;
        $this->setOptions();
    }

    public function getPrice()
    {
        return $this->options->price;
    }

    public function getTotal()
    {
        return $this->getQuantity() * $this->getPrice();
    }

    public function getQuantity()
    {
        return $this->options->quantity;
    }

    public function getOptions()
    {
        return $this->options;
    }

    private function setOptions()
    {
        $this->options = $this->item->getOptions();
    }
} 
