<?php

namespace Src\API\Application\Cart\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\API\Application\Cart\Application\Auth\RequestGetUserDataUseCase;
use Src\API\Application\Cart\Application\Delete\DeleteCartItemUseCase;
use Src\API\Application\Cart\Application\Get\FindUserCartUseCase;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;
use Src\API\Application\Cart\Domain\ValueObjects\RequestJwt;
use Src\API\Application\Cart\Domain\ValueObjects\UserID;
use Src\API\Shared\Infrastructure\Helper\HttpCodesHelper;

final class DeleteCartItemController extends \Src\API\Shared\Infrastructure\Controllers\CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly RequestGetUserDataUseCase $requestGetUserDataUseCase,
        private readonly FindUserCartUseCase $findUserCartUseCase,
        private readonly DeleteCartItemUseCase $deleteCartItemUseCase,
    )
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $jwt = $request->header('authentication');
        $userData = $this->requestGetUserDataUseCase->__invoke(new RequestJwt($jwt));
        $userCart = $this->findUserCartUseCase->__invoke(new UserID($userData[0]->data->id));

        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->deleteCartItemUseCase->__invoke($userCart->getCartId(), new ProductID($request->product_id))->handler()
        );
    }
}
