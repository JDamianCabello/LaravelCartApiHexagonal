<?php

namespace Src\API\Application\Cart\Domain;

use Src\API\Application\Cart\Domain\Exceptions\ProductNotFoundException;
use Src\API\Application\Cart\Domain\ValueObjects\CartID;
use Src\API\Shared\Domain\Domain;
use Src\API\Shared\Domain\Helper\HttpCodesDomainHelper;

final class Cart extends Domain
{

    use HttpCodesDomainHelper;

    private const PRODUCT_NOT_FOUND_EXCEPTION = 'PRODUCT_NOT_FOUND';


    /**
     * @var array
     */
    public array $cartItems = [];

    /**
     * @var CartID
     */
    public CartID $cartId;

    /**
     * @return array
     */
    public function handler(): array{
        $handleResponse = [];
        foreach ($this->cartItems as $cartItem) {

            $handleResponse[] = [
                "product_id" => $cartItem["product_id"],
                "quantity" => $cartItem["quantity"],
                "name" => $cartItem["product"]["name"],
                "description" => $cartItem["product"]["description"],
                "image" => $cartItem["product"]["image"],
                "price" => $cartItem["product"]["price"]
            ];
        }
        return [
            'items' => $handleResponse
        ];
    }

    /**
     * @inheritDoc
     */
    protected function isException(?string $exception): void
    {
        if(!is_null($exception)){
            match ($exception){
                self::PRODUCT_NOT_FOUND_EXCEPTION => throw new ProductNotFoundException("Product not found", $this->badRequest())
            };
        }
    }

    /**
     * @return array
     */
    public function getCartItems(): array
    {
        return $this->cartItems;
    }

    /**
     * @param array $cartItems
     */
    public function setCartItems(array $cartItems): void
    {
        $this->cartItems = $cartItems;
    }

    /**
     * @return CartID
     */
    public function getCartId(): CartID
    {
        return $this->cartId;
    }

    /**
     * @param CartID $cartId
     */
    public function setCartId(CartID $cartId): void
    {
        $this->cartId = $cartId;
    }
}
