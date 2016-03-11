<?php

namespace CL\Matrix\Renderer;

use CL\Matrix\Matrix;

interface RendererInterface
{
    /**
     * @param Matrix $matrix
     * @param bool   $withHeaders
     *
     * @return string
     */
    public function render(Matrix $matrix, $withHeaders = true);
}
