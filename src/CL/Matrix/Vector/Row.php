<?php

namespace CL\Matrix\Vector;

use CL\Matrix\Element;
use CL\Matrix\Matrix;

class Row extends AbstractVector
{
    /**
     * @param Matrix $matrix
     * @param int    $matrixOffset
     */
    public function setMatrix(Matrix $matrix, $matrixOffset)
    {
        $this->matrix = $matrix;

        foreach ($this->getElements() as $offset => $element) {
            if (!$this->matrix->hasColumn($offset)) {
                $this->matrix->setColumn($offset, new Column([]));
            }

            $this->matrix->getColumn($offset)->addElement($element);
        }

        $this->matrixOffset = $matrixOffset;
    }

    /**
     * @param Element $element
     */
    public function addElement(Element $element)
    {
        array_push($this->elements, $element);

        $keys = array_keys($this->elements);
        $offset = end($keys);

        if ($this->matrix) {
            if ($this->matrix->hasColumn($offset)) {
                $this->matrix->getColumn($offset)->addElement($element);
            }
        }
    }

    /**
     * @param int     $offset
     * @param Element $element
     */
    public function setElement($offset, Element $element)
    {
        $this->elements[$offset] = $element;

        if ($this->matrix) {
            if ($this->matrix->hasColumn($offset)) {
                $this->matrix->getColumn($offset)->setElement($this->matrixOffset, $element);
            }
        }
    }

    /**
     * @param mixed[] $values
     *
     * @return Row
     */
    public static function createFromArray(array $values)
    {
        $vector = new self;

        foreach ($values as $offset => $value) {
            $vector->setElement($offset, new Element($value));
        }

        return $vector;
    }
}
