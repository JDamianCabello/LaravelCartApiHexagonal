<?php

namespace Src\API\Application\Cart\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\API\Application\Cart\Application\Auth\RequestGetUserDataUseCase;
use Src\API\Application\Cart\Application\Get\FindUserCartUseCase;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;
use Src\API\Application\Cart\Domain\ValueObjects\RequestJwt;
use Src\API\Application\Cart\Domain\ValueObjects\UserID;
use Src\API\Shared\Infrastructure\Controllers\CustomController;
use Src\API\Shared\Infrastructure\Helper\HttpCodesHelper;

final class GetUserCartController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly RequestGetUserDataUseCase $requestGetUserDataUseCase,
        private readonly FindUserCartUseCase $findUserCartUseCase,
    )
    {
    }

    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $jwt = $request->header('authentication');
        $userData = $this->requestGetUserDataUseCase->__invoke(new RequestJwt($jwt));

        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->findUserCartUseCase->__invoke(new UserID($userData[0]->data->id), true)->handler()
        );
    }
}
