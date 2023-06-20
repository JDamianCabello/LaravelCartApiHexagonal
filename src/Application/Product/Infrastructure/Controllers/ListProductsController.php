<?php

namespace Src\Application\Product\Infrastructure\Controllers;

use Src\Application\Product\Application\Get\ProductIndexUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

class ListProductsController extends CustomController
{
    use HttpCodesHelper;


    public function __construct(
        private readonly ProductIndexUseCase $indexUseCase
    )
    {
    }

    public function __invoke()
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->indexUseCase->__invoke()
        );
    }
}
