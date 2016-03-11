<?php

namespace CL\Matrix\Exporter;

use CL\Matrix\Matrix;

interface ExporterInterface
{
    /**
     * @param Matrix   $matrix
     * @param resource $resource
     *
     * @return bool
     */
    public function export(Matrix $matrix, $resource);
}
