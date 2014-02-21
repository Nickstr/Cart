<?php  namespace Product\Options; 

use Cart\Product\Options\Options;

class OptionsTest extends \TestCase
{
    public function testCanCreateProductOptionsFactory()
    {
        $this->assertInstanceOf('Cart\Product\Options\Options', $this->createOptions());
    }

    public function testCanReturnOptions()
    {
        $input = ['foo', 'bar'];
        $options = $this->createOptions($input);

        $this->assertEquals($options->get(), $input);
    }

    public function testCanConvertToJson()
    {
        $input = ['foo', 'bar'];
        $options = $this->createOptions($input);

        $this->assertEquals($options->toJson(), json_encode($input));
    }

    private function createOptions($options = array())
    {
        return new Options($options);
    }
} 
