<?php  namespace Cart\Cart; 

use Cart\Core\Entity;

class Item extends Entity
{
    public function cart()
    {
        return $this->belongsTo('Cart\Cart\Cart');
    }

    public function decorate()
    {
        return new ItemDecorator($this);
    }

    public function getValues()
    {
        return $this->values;
    }
}
