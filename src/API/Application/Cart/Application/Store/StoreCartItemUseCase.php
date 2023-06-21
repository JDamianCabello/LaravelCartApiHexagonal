<?php

namespace Src\API\Application\Cart\Application\Store;

use Src\API\Application\Cart\Domain\Cart;
use Src\API\Application\Cart\Domain\Contracts\CartRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\CartID;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;
use Src\API\Shared\Infrastructure\Controllers\CustomController;

final class StoreCartItemUseCase extends CustomController
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
        return $this->cartRepositoryContract->addToCart($userCart, $productID);
    }
}
