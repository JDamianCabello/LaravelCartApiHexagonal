<?php

namespace Src\Management\Login\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class LoginAuthController extends CustomController
{
    use HttpCodesHelper;

    public function __invoke(): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            'hello'
        );
    }
}
