<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'rating',
        'price',
        'promotional_price',
        'installment_limit'
    ];

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collections_products');
    }
}
