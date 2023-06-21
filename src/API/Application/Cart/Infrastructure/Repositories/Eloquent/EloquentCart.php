<?php

namespace Src\API\Application\Cart\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class EloquentCart extends Model
{
    /**
     * @var string
     */
    protected $table = 'carts';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id'];

    /**
     * Get the item associated with the cart.
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }
}
