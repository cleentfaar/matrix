<?php

namespace CL\Matrix\Tests\Vector;

use CL\Matrix\Test\AbstractVectorTestCase;
use CL\Matrix\Vector\Column;

class ColumnTest extends AbstractVectorTestCase
{
    /**
     * @inheritdoc
     */
    protected function getClass()
    {
        return Column::class;
    }
}
