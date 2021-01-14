<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['image', 'order', 'available_at', 'expires_in'];

    protected $casts = [
        'available_at' => 'datetime',
        'expires_in'   => 'datetime',
    ];

    public function homeSection()
    {
        return $this->belongsTo(HomeSection::class, 'home_section_id', 'id');
    }

    public function scopeAvailable($query)
    {
        $query->where(function($subQuery) {
            $subQuery
                ->where('available_at', '<=', now())
                ->where(function($subQuery2){
                    $subQuery2
                        ->whereNull('expires_in')
                        ->orWhere('expires_in', '>', now());
                });
        });
    }
}
