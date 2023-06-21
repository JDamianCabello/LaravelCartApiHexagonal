<?php

namespace Src\API\Application\Cart\Infrastructure\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use Src\API\Application\Cart\Domain\Cart;
use Src\API\Application\Cart\Domain\Contracts\CartRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\CartID;
use Src\API\Application\Cart\Domain\ValueObjects\ProductID;
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
            $userCart = $this->cart::firstOrCreate(['user_id' =>  $userID->value()])->with('items', 'items.product')->first();
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
        $cartItem = new CartItem();

        $findItemCart = $cartItem::firstOrCreate([
            'cart_id' =>  $userCart->value(),
            'product_id' =>  $productID->value()
        ], ['quantity' => 1]);

        if(!$findItemCart->wasRecentlyCreated){
            $findItemCart->quantity += 1;
            $findItemCart->save();
        }



        $domainCart = new Cart();
        $domainCart->setCartId($userCart);
        $fullcart = $this->cart::find($userCart->value())->with('items', 'items.product')->first();
        $domainCart->setCartItems($fullcart->items->toArray());

        return $domainCart;
    }
}
