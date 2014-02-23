<?php  namespace Cart\Product\Modifiers; 

abstract class Modifier
{
    public $target;
    public $name;
    public $value;

    public function getTarget()
    {
        return $this->target;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function hydrateValues($values)
    {
        foreach($values as $key => $value) {
            $this->$key = $value;
        }
    }
} 
