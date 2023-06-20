<?php

namespace Src\Application\Product\Infrastructure\Repositories\Eloquent;

use Src\Application\Product\Domain\Contracts\ProductsRepositoryContract;

class ProductRepository implements ProductsRepositoryContract
{
    /**
     * @var Product
     */
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * @return array
     */
    public function index(): array
    {
        return $this->product::all()->toArray();
    }
}
