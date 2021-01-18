<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSection;
use App\Models\Product;

use Validator;

class CollectionController extends Controller
{
    public function maintain(Request $request, $sectionId)
    {
        $section = optional(
            HomeSection::where('id', $sectionId)
            ->where('type', 'collection')
            ->with('collection.products')
            ->first()
        );

        if (!$section)
            return redirect()->back();

        $products = Product::all();

        $selectedProducts =
            $section->collection
            ? $section->collection->products->pluck('id')->toArray()
            : [];

        $selectedProducts = array_merge($selectedProducts, old('product_id', []));

        return view('collection.maintain',  compact('section', 'products', 'selectedProducts'));
    }

    public function update(Request $request, $sectionId)
    {
        $section = HomeSection::where('id', $sectionId)
            ->where('type', 'collection')
            ->with('collection')
            ->first();

        if (!$section)
            return redirect()->back();

        $request->validate([
            'title' => 'required|max:255',
            'product_id' => 'required|array'
        ]);

        $productsId = Product::whereIn('id', $request->get('product_id'))->get()->pluck('id')->toArray();

        if ($section->collection) {
            $section->collection->update($request->only(['title']));
            $section->collection->products()->sync($productsId);
        } else {
            $collection = $section->collection()->create($request->only(['title']));
            $collection->products()->attach($productsId);
        }

        cache()->forget('dashboard-data');

        return redirect()->route('home_section.index')->with(['section_active_id' => $section->id]);
    }

    public function destroy(Request $request, $sectionId)
    {
        $section = HomeSection::where('id', $sectionId)
            ->where('type', 'collection')
            ->with('collection')
            ->first();

        if (!$section)
            return redirect()->back();

        if ($section->collection) {
            $section->collection->delete();
        }

        cache()->forget('dashboard-data');

        return redirect()->route('home_section.index')->with(['section_active_id' => $section->id]);
    }
}
