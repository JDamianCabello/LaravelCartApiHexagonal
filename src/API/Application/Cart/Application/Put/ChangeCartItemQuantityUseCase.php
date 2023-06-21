<?php

namespace Src\API\Application\Cart\Application\Put;

use Src\API\Application\Cart\Domain\Cart;
use Src\API\Application\Cart\Domain\Contracts\CartRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\CartID;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;
use Src\API\Application\Cart\Domain\ValueObjects\QuantityValueObject;

final class ChangeCartItemQuantityUseCase
{
    /**
     * @param CartRepositoryContract $cartRepositoryContract
     */
    public function __construct(
        private readonly CartRepositoryContract $cartRepositoryContract

    )
    {
    }

    /**
     * @param CartID $userCart
     * @param ProductID $productID
     * @return Cart
     */
    public function __invoke(CartID $userCart, ProductID $productID, QuantityValueObject $quantity): Cart
    {
        return $this->cartRepositoryContract->changeItemQuantity($userCart, $productID, $quantity);
    }
}
