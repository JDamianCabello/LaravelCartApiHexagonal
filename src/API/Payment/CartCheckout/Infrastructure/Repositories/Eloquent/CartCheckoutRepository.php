<?php

namespace Src\API\Payment\CartCheckout\Infrastructure\Repositories\Eloquent;

use Src\API\Payment\CartCheckout\Domain\Checkout;
use Src\API\Payment\CartCheckout\Domain\Contracts\CheckoutContract;
use Src\API\Payment\CartCheckout\Domain\ValueObjects\UserID;

class CartCheckoutRepository implements CheckoutContract
{

    private Cart $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    /**
     * @param UserID $userID
     * @return Checkout
     */
    public function checkout(UserID $userID): Checkout
    {
        $cartToPay = $this->cart::where('user_id', $userID->value())->first();
        $chekout = new Checkout();
        $chekout->payed = $cartToPay->delete();
        return $chekout;
    }
}
