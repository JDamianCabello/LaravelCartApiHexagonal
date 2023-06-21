<?php

namespace Src\API\Management\Login\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\API\Shared\Infrastructure\Controllers\CustomController;
use Src\API\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\API\Management\Login\Application\Login\LoginAuthUseCase;

final class LoginAuthController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(private readonly LoginAuthUseCase $loginAuthUseCase)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->loginAuthUseCase->__invoke($request->toArray())->entity()
        );
    }
}
