<?php  namespace Cart\Product\Options; 

class Options
{
    private $options;

    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function get()
    {
        return $this->options;
    }

    public function toJson()
    {
        return json_encode($this->options);
    }
} 
