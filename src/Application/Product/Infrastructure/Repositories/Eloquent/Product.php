<?php

namespace Src\Application\Product\Infrastructure\Repositories\Eloquent;

class Product extends \Illuminate\Database\Eloquent\Model
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
