<?php

namespace CL\Matrix\Vector;

use CL\Matrix\Element;
use CL\Matrix\Matrix;

interface VectorInterface
{
    /**
     * @param Matrix $matrix
     * @param int    $matrixOffset
     */
    public function setMatrix(Matrix $matrix, $matrixOffset);

    /**
     * @param Element $element
     */
    public function addElement(Element $element);

    /**
     * @param int     $offset
     * @param Element $element
     */
    public function setElement($offset, Element $element);

    /**
     * @param int $offset
     *
     * @return Element
     */
    public function getElement($offset);

    /**
     * @return Element[]
     */
    public function getElements();

    /**
     * @param array $values
     *
     * @return Row|Column
     */
    public static function createFromArray(array $values);
}
