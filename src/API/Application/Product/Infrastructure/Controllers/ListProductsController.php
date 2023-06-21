<?php

namespace Src\API\Application\Product\Infrastructure\Controllers;

use Src\API\Shared\Infrastructure\Controllers\CustomController;
use Src\API\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\API\Application\Product\Application\Get\ProductIndexUseCase;

final class ListProductsController extends CustomController
{
    use HttpCodesHelper;


    public function __construct(
        private readonly ProductIndexUseCase $indexUseCase
    )
    {
    }

    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->indexUseCase->__invoke()
        );
    }
}
