<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeSection;
use App\Http\Resources\SectionResource;

use DB;

class HomeSectionController extends Controller
{
    public function index()
    {
        $sections = HomeSection::with(
            [
                'banners' => function($query) {
                    // Metodo available está executando o Banner::scopeAvailable
                    $query->available()->orderBy('order');
                },
                'collection.products'
            ]
        )->orderBy('order')->get();

        return SectionResource::collection($sections)->collection;
    }
}
