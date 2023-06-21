<?php

namespace Src\API\Application\Cart\Application\Delete;

use Src\API\Application\Cart\Domain\Cart;
use Src\API\Application\Cart\Domain\Contracts\CartRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\CartID;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;

final class DeleteCartItemUseCase
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
    public function __invoke(CartID $userCart, ProductID $productID): Cart
    {
        return $this->cartRepositoryContract->deleteFromCart($userCart, $productID);
    }
}
