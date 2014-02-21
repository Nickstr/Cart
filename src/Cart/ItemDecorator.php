<?php  namespace Cart\Cart; 

class ItemDecorator
{
    private $values;

    public function __construct(Item $item)
    {
        $this->item = $item;
        $this->setValues();
    }

    public function getPrice()
    {
        return $this->values->price;
    }

    public function getTotal()
    {
        return $this->getQuantity() * $this->getPrice();
    }

    public function getQuantity()
    {
        return $this->values->quantity;
    }

    public function getValues()
    {
        return $this->values;
    }

    private function setValues()
    {
        $this->values = (object) $this->item->getValues();
    }
} 
