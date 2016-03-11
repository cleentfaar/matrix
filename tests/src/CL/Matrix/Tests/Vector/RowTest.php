<?php

namespace CL\Matrix\Tests\Vector;

use CL\Matrix\Test\AbstractVectorTestCase;
use CL\Matrix\Vector\Row;

class RowTest extends AbstractVectorTestCase
{
    /**
     * @inheritdoc
     */
    protected function getClass()
    {
        return Row::class;
    }
}
