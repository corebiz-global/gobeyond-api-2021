<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeSection;
use App\Http\Resources\SectionResource;

class HomeSectionController extends Controller
{
    public function index()
    {
        $sections = HomeSection::with(
            [
                'banners' => function($query) {
                    $query->orderBy('order');
                },
                'collection.products'
            ]
        )->orderBy('order')->get();

        return SectionResource::collection($sections)->collection;
    }
}
