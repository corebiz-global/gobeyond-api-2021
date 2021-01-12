<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];

    public function homeSection()
    {
        return $this->belongsTo(HomeSection::class, 'home_section_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'collections_products', 'collection_id', 'product_id');
    }
}
