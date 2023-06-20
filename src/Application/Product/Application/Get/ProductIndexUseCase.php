<?php

namespace Src\Application\Product\Application\Get;

use Src\Application\Product\Domain\Contracts\ProductsRepositoryContract;

class ProductIndexUseCase
{
    public function __construct(
        private readonly ProductsRepositoryContract $productsRepositoryContract
    )
    {
    }

    public function __invoke(): array
    {
        return $this->productsRepositoryContract->index();
    }
}
