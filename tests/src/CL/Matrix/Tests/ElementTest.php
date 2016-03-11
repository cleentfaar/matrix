<?php

namespace CL\Matrix\Tests;

use CL\Matrix\Element;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider getValues
     */
    public function it_can_be_constructed_with_any_value($value)
    {
        $element = new Element($value);

        $this->assertSame(
            $value,
            $element->getValue(),
            'The value returned by getValue() should match the value used to construct the element'
        );
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return [
            [1.234],
            [1234],
            ['1234'],
            [[1,2,3,4]],
            [new \stdClass()],
            [function () { return 'Foobar'; }],
        ];
    }
}
