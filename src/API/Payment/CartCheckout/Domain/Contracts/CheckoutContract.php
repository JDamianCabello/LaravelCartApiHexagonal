<?php

namespace Src\API\Payment\CartCheckout\Domain\Contracts;

use Src\API\Payment\CartCheckout\Domain\Checkout;
use Src\API\Payment\CartCheckout\Domain\ValueObjects\UserID;

interface CheckoutContract
{
    public function checkout(UserID $userID): Checkout;
}
