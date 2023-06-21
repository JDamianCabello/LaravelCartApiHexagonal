<?php

namespace Src\API\Application\Product\Application\Get;

use Src\API\Application\Product\Domain\Contracts\ProductsRepositoryContract;

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
