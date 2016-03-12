<?php

namespace CL\Matrix\Test;

use CL\Matrix\Element;
use CL\Matrix\Vector\AbstractVector;
use CL\Matrix\Vector\VectorInterface;

abstract class AbstractVectorTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed_without_elements()
    {
        $this->createVector([]);
    }

    /**
     * @test
     */
    public function it_can_return_elements_by_offset()
    {
        $vector = $this->createVector([$offset = 1234 => $element = new Element('1234')]);

        $this->assertSame(
            $element,
            $vector->getElement($offset),
            'The element returned should match the element it was constructed with'
        );
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage There is no element in this vector with that offset: 1234
     */
    public function it_throws_an_exception_when_element_offset_does_not_exist()
    {
        $vector = $this->createVector();
        $vector->getElement(1234);
    }

    /**
     * @test
     */
    public function it_can_be_created_from_an_array()
    {
        $class = $this->getClass();
        $data = ['name' => 'banana', 'color' => 'yellow'];

        /* @var AbstractVector $vector */
        $vector = $class::createFromArray($data);

        $this->assertSame('banana', $vector->getElement('name')->getValue());
        $this->assertSame('yellow', $vector->getElement('color')->getValue());
    }

    /**
     * @param array $elements
     *
     * @return VectorInterface
     */
    protected function createVector(array $elements = [])
    {
        $class = $this->getClass();

        return new $class($elements);
    }

    /**
     * @return string
     */
    abstract protected function getClass();
}
