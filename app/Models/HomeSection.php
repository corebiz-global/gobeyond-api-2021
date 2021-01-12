<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSection extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'order', 'dimensions'];

    protected $dates = ['deleted_at'];

    protected $hidden = ['deleted_at'];

    protected $casts = ['dimensions' => 'json'];

    public function collection()
    {
        return $this->hasOne(Collection::class, 'home_section_id', 'id');
    }

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    public function isTypeBanners()
    {
        return $this->type === 'banners';
    }

    public function isTypeCollection()
    {
        return $this->type === 'collection';
    }
}
