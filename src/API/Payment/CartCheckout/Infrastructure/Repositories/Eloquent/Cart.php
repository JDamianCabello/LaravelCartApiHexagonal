<?php

namespace Src\API\Payment\CartCheckout\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

final class Cart extends Model
{
    /**
     * @var string
     */
    protected $table = 'carts';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id'];

}
