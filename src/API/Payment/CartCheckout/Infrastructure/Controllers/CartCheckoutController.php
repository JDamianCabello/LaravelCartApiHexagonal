<?php

namespace Src\API\Payment\CartCheckout\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\API\Payment\CartCheckout\Application\Checkout\CheckoutUseCase;
use Src\API\Payment\CartCheckout\Domain\ValueObjects\UserID;
use Src\API\Shared\Infrastructure\Controllers\CustomController;
use Src\API\Shared\Infrastructure\Helper\HttpCodesHelper;

final class CartCheckoutController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly CheckoutUseCase $checkoutUseCase
    )
    {
    }

    public function __invoke(Request $request)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->checkoutUseCase->__invoke(new UserID($request->user_id))->handler()
        );
    }
}
