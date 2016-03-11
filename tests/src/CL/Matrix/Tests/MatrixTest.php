<?php

namespace CL\Matrix\Tests;

use CL\Matrix\Element;
use CL\Matrix\Matrix;
use CL\Matrix\Vector\Column;
use CL\Matrix\Vector\Row;

class MatrixTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed_with_empty_rows()
    {
        new Matrix();
    }

    /**
     * @test
     */
    public function it_can_add_a_row_with_no_elements()
    {
        $matrix = new Matrix();
        $matrix->addRow($row = new Row());

        $this->assertCount(1, $matrix->getRows());
        $this->assertContains($row, $matrix->getRows());
        $this->assertEmpty($matrix->getColumns(), 'No columns should have been added if the row contains no elements');
    }

    /**
     * @test
     */
    public function it_can_add_a_row_with_elements()
    {
        $matrix = new Matrix();
        $matrix->addRow($row = new Row([$columnOffset = 123 => $element = new Element('Foobar')]));

        $this->assertCount(1, $matrix->getRows());
        $this->assertContains($row, $matrix->getRows());

        $column = $matrix->getColumn($columnOffset);

        $this->assertCount(1, $matrix->getColumns(), 'One column should have been added if the row contains one element');
        $this->assertCount(1, $column->getElements(), 'The added column should contain one element if the row contains one element');
        $this->assertContains($element, $column->getElements(), 'The added column should contain the same element as the row');
    }

    /**
     * @test
     */
    public function it_can_return_a_row_by_offset()
    {
        $matrix = new Matrix();
        $matrix->addRow($row = new Row([]));

        $offsets = array_keys($matrix->getRows());

        $this->assertSame($row, $matrix->getRow(end($offsets)));
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_row_offset_does_not_exist()
    {
        $matrix = new Matrix();
        $matrix->addRow($row = new Row([]));

        $offsets = array_keys($matrix->getRows());
        $existingOffset = end($offsets);
        $nonExistingOffset = $existingOffset + 1;

        $this->assertTrue($matrix->hasRow($existingOffset));
        $this->assertFalse($matrix->hasRow($nonExistingOffset));

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('There is no row in this matrix with that offset: 1');

        $this->assertSame($row, $matrix->getRow($nonExistingOffset));
    }

    /**
     * @test
     */
    public function it_can_add_a_column_with_no_elements()
    {
        $matrix = new Matrix();
        $matrix->addColumn($column = new Column());

        $this->assertCount(1, $matrix->getColumns());
        $this->assertContains($column, $matrix->getColumns());
        $this->assertEmpty($matrix->getRows(), 'No rows should have been added if the column contains no elements');
    }

    /**
     * @test
     */
    public function it_can_add_a_column_with_elements()
    {
        $matrix = new Matrix();
        $matrix->addColumn($column = new Column([$rowOffset = 123 => $element = new Element('Foobar')]));

        $this->assertCount(1, $matrix->getColumns());
        $this->assertContains($column, $matrix->getColumns());

        $row = $matrix->getRow($rowOffset);

        $this->assertCount(1, $matrix->getRows(), 'One row should have been added if the column contains one element');
        $this->assertCount(1, $row->getElements(), 'The added row should contain one element if the column contains one element');
        $this->assertContains($element, $row->getElements(), 'The added row should contain the same element as the column');
    }

    /**
     * @test
     */
    public function it_can_return_a_column_by_offset()
    {
        $matrix = new Matrix();
        $matrix->addColumn($column = new Column([]));

        $offsets = array_keys($matrix->getColumns());

        $this->assertSame($column, $matrix->getColumn(end($offsets)));
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_column_offset_does_not_exist()
    {
        $matrix = new Matrix();
        $matrix->addColumn($column = new Column([]));

        $offsets = array_keys($matrix->getColumns());
        $existingOffset = end($offsets);
        $nonExistingOffset = $existingOffset + 1;

        $this->assertTrue($matrix->hasColumn($existingOffset));
        $this->assertFalse($matrix->hasColumn($nonExistingOffset));

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('There is no column in this matrix with that offset: 1');

        $this->assertSame($column, $matrix->getColumn($nonExistingOffset));
    }
}
