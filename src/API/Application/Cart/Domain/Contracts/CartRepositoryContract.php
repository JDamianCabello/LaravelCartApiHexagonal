<?php

namespace Src\API\Application\Cart\Domain\Contracts;

use Src\API\Application\Cart\Domain\Cart;
use Src\API\Application\Cart\Domain\ValueObjects\CartID;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;
use Src\API\Application\Cart\Domain\ValueObjects\QuantityValueObject;
use Src\API\Application\Cart\Domain\ValueObjects\UserID;

interface CartRepositoryContract
{
    public function getUserCart(UserID $userID, bool $withRelationships = false): Cart;

    public function addToCart(CartID $userCart, ProductID $productID): Cart;

    public function deleteFromCart(CartID $userCart, ProductID $productID): Cart;

    public function changeItemQuantity(CartID $userCart, ProductID $productID, QuantityValueObject $quantity): Cart;
}
