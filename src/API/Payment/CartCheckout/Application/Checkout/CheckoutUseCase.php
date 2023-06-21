<?php

namespace Src\API\Payment\CartCheckout\Application\Checkout;

use Src\API\Payment\CartCheckout\Domain\Checkout;
use Src\API\Payment\CartCheckout\Domain\Contracts\CheckoutContract;
use Src\API\Payment\CartCheckout\Domain\ValueObjects\UserID;

final class CheckoutUseCase
{
    public function __construct(
        private readonly CheckoutContract $checkoutContract
    )
    {
    }

    /**
     * @param UserID $userID
     * @return Checkout
     */
    public function __invoke(UserID $userID): Checkout
    {
        return $this->checkoutContract->checkout($userID);
    }
}
