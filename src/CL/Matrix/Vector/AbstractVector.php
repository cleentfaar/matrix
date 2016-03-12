<?php

namespace CL\Matrix\Vector;

use CL\Matrix\Element;
use CL\Matrix\Matrix;

abstract class AbstractVector implements VectorInterface
{
    /**
     * @var Element[]
     */
    protected $elements = [];

    /**
     * @var Matrix|null
     */
    protected $matrix;

    /**
     * @var int|null
     */
    protected $matrixOffset;

    /**
     * @param Element[] $elements
     * @param Matrix    $matrix
     * @param int|null  $matrixOffset
     */
    public function __construct(array $elements = [], Matrix $matrix = null, $matrixOffset = null)
    {
        foreach ($elements as $offset => $element) {
            $this->setElement($offset, $element);
        }

        if ($matrix) {
            if (!$matrixOffset) {
                throw new \InvalidArgumentException('You must also supply a matrix offset when setting the matrix');
            }

            $this->setMatrix($matrix, $matrixOffset);
        }
    }

    /**
     * @param int $offset
     *
     * @return Element
     */
    public function getElement($offset)
    {
        if (!array_key_exists($offset, $this->elements)) {
            throw new \InvalidArgumentException(sprintf(
                'There is no element in this vector with that offset: %s',
                $offset
            ));
        }

        return $this->elements[$offset];
    }

    /**
     * @return Element[]
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param array $values
     *
     * @return Row|Column
     */
    public static function createFromArray(array $values)
    {
        $class = static::class;

        /* @var AbstractVector $vector */
        $vector = new $class();

        foreach ($values as $offset => $value) {
            $vector->setElement($offset, new Element($value));
        }

        return $vector;
    }
}
