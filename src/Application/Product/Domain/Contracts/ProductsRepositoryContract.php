<?php

namespace Src\Application\Product\Domain\Contracts;

interface ProductsRepositoryContract
{
    /**
     * @return array
     */
    public function index(): array;
}
