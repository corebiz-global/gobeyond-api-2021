<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomeSection;

class HomeSectionController extends Controller
{
    public function index()
    {
        $homeSections = HomeSection::orderBy('order')->get();
        return view('sections.home.index', compact('homeSections'));
    }
}
