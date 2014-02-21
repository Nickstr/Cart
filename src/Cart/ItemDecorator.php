<?php namespace Cart\Cart;

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

    public function getValue($value)
    {
        return $this->values->$value;
    }

    private function setValues()
    {
        $this->values = (object) $this->item->getValues();
    }
}
