<?php

namespace Src\API\Application\Cart\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartItem extends Model
{
    /**
     * @var int|mixed
     */

    protected $table = 'carts_items';

    protected $fillable = [
      'cart_id',
      'product_id',
      'quantity'
    ];

    /**
     * Get the product associated with the item.
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
