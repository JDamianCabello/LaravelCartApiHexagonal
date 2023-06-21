<?php

namespace Src\API\Application\Cart\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
    ];
}
