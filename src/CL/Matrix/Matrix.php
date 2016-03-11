<?php

namespace CL\Matrix;

use CL\Matrix\Vector\Column;
use CL\Matrix\Vector\Row;

class Matrix
{
    /**
     * @var Row[]
     */
    private $rows = [];

    /**
     * @var Column[]
     */
    private $columns = [];

    /**
     * @param Row[] $rowVectors
     */
    public function __construct(array $rowVectors = [])
    {
        foreach ($rowVectors as $rowVector) {
            $this->addRow($rowVector);
        }
    }

    /**
     * @param Row $row
     */
    public function addRow(Row $row)
    {
        array_push($this->rows, $row);

        $keys = array_keys($this->rows);
        $offset = end($keys);

        $row->setMatrix($this, $offset);
    }

    /**
     * @param int $offset
     * @param Row $row
     */
    public function setRow($offset, Row $row)
    {
        $this->rows[$offset] = $row;
    }

    /**
     * @param int $offset
     *
     * @return Row
     */
    public function getRow($offset)
    {
        if (!array_key_exists($offset, $this->rows)) {
            throw new \InvalidArgumentException(sprintf(
                'There is no row in this matrix with that offset: %s',
                $offset
            ));
        }

        return $this->rows[$offset];
    }

    /**
     * @return Row[]
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param int $offset
     *
     * @return bool
     */
    public function hasRow($offset)
    {
        return array_key_exists($offset, $this->rows);
    }

    /**
     * @param Column $column
     */
    public function addColumn(Column $column)
    {
        array_push($this->columns, $column);

        $keys = array_keys($this->columns);
        $offset = end($keys);

        $column->setMatrix($this, $offset);
    }

    /**
     * @param int    $offset
     * @param Column $column
     */
    public function setColumn($offset, Column $column)
    {
        $this->columns[$offset] = $column;
    }

    /**
     * @param int $offset
     *
     * @return Column
     */
    public function getColumn($offset)
    {
        if (!array_key_exists($offset, $this->columns)) {
            throw new \InvalidArgumentException(sprintf(
                'There is no column in this matrix with that offset: %s',
                $offset
            ));
        }

        return $this->columns[$offset];
    }

    /**
     * @return Column[]
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param int $offset
     *
     * @return bool
     */
    public function hasColumn($offset)
    {
        return array_key_exists($offset, $this->columns);
    }
}
