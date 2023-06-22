<?php

namespace Src\API\Application\Cart\Infrastructure\Repositories\Eloquent;

use Src\API\Application\Cart\Domain\Cart;
use Src\API\Application\Cart\Domain\Contracts\CartRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\CartID;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;
use Src\API\Application\Cart\Domain\ValueObjects\QuantityValueObject;
use Src\API\Application\Cart\Domain\ValueObjects\UserID;

final class CartRepository implements CartRepositoryContract
{

    private EloquentCart $cart;

    public function __construct()
    {
        $this->cart = new EloquentCart();
    }

    /**
     * @param UserID $userID
     * @return Cart
     */
    public function getUserCart(UserID $userID, bool $withRelationships = false): Cart
    {
        $domainCart = new Cart();
        if($withRelationships){
            $userCart = $this->getFullCartByUser($userID);
        }else{
            $userCart = $this->cart::firstOrCreate(['user_id' =>  $userID->value()])->first();
        }
        $domainCart->setCartId(new CartID($userCart->id));
        $domainCart->setCartItems($userCart->items->toArray());

        return $domainCart;
    }

    /**
     * @param CartID $userCart
     * @param ProductID $productID
     * @return Cart
     */
    public function addToCart(CartID $userCart, ProductID $productID): Cart
    {
        $this->checkProductExist($productID);
        $cartItem = new CartItem();

        $findItemCart = $cartItem::firstOrCreate([
            'cart_id' =>  $userCart->value(),
            'product_id' =>  $productID->value()
        ], ['quantity' => 1]);

        if(!$findItemCart->wasRecentlyCreated){
            $findItemCart->quantity += 1;
            $findItemCart->save();
        }

        return $this->getCartByCartID($userCart);
    }

    /**
     * @param CartID $userCart
     * @param ProductID $productID
     * @return Cart
     */
    public function deleteFromCart(CartID $userCart, ProductID $productID): Cart
    {
        $this->checkProductExist($productID);
        $cartItem = new CartItem();
        $cartItem::where([
            'cart_id' =>  $userCart->value(),
            'product_id' =>  $productID->value()
        ])->delete();

        return $this->getCartByCartID($userCart);
    }

    private function getFullCartByUser(UserID $userID)
    {
        return $this->cart::firstOrCreate(['user_id' =>  $userID->value()])->with('items', 'items.product')->first();
    }

    private function getCartByCartID(CartID $userCart): Cart
    {
        $domainCart = new Cart();
        $domainCart->setCartId($userCart);
        $fullcart = $this->cart::find($userCart->value())->with('items', 'items.product')->first();
        $domainCart->setCartItems($fullcart->items->toArray());

        return $domainCart;
    }

    /**
     * @param CartID $userCart
     * @param ProductID $productID
     * @param QuantityValueObject $quantity
     * @return Cart
     */
    public function changeItemQuantity(CartID $userCart, ProductID $productID, QuantityValueObject $quantity): Cart
    {
        $this->checkProductExist($productID);
        $cartItem = new CartItem();
        $userCartItem = $cartItem::where([
            'cart_id' =>  $userCart->value(),
            'product_id' =>  $productID->value()
        ])->first();

        $userCartItem->quantity += $quantity->value();

        if($userCartItem->quantity <= 0){
            $userCartItem->delete();
        }else{
            $userCartItem->save();
        }

        return $this->getCartByCartID($userCart);
    }

    private function checkProductExist(ProductID $productID)
    {
        $product = new Product();
        $check = $product::find($productID->value());

        if(!$check){
            return new Cart(null, 'PRODUCT_NOT_FOUND');
        }
    }
}
