<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Banner;
use App\Models\HomeSection;

use Validator;
use Carbon\Carbon;

class BannerController extends Controller
{
    public function create(Request $request)
    {
        $form = optional([
            'home_section_id' => $request->old('home_section_id', $request->get('section_id', null)),
        ]);

        if ($request->has('section_id')) {
            session()->flash('section_active_id', $request->get('section_id'));
        }

        $sections = HomeSection::where('type', 'banners')->get();

        return view('banners.create', compact('sections', 'form'));
    }

    public function store(Request $request)
    {
        $section = HomeSection::find($request->get('home_section_id'));

        $this->makeValidate($request, $section);

        $data = $request->all();
        $data['image'] = asset("storage/" . $request->file('image')->store('images/banners', 'public'));
        $data = $this->formatDates($data);

        $section->banners()->create($data);

        cache()->forget('dashboard-data');

        return redirect()->route('home_section.index')->with(['section_active_id' => $section->id]);
    }

    public function edit(Request $request, $id)
    {
        $banner = Banner::find($id);

        if (!$banner)
            return redirect()->route('banners.create');

        $form = $banner->toArray();
        $form['available_at'] = $banner->available_at->format('d/m/Y');

        if ($form['expires_in'])
            $form['expires_in'] = $banner->expires_in->format('d/m/Y');

        return view('banners.edit', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);

        if (!$banner)
            return redirect()->route('banners.create');

        $this->makeValidate($request, $banner->homeSection, $banner);

        $data = $request->all();

        if($request->hasFile('image'))
            $data['image'] = asset("storage/" . $request->file('image')->store('images/banners', 'public'));

        $data = $this->formatDates($data);

        $banner->update($data);

        cache()->forget('dashboard-data');

        return redirect()->route('home_section.index')->with(['section_active_id' => $banner->homeSection->id]);
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);

        if (!$banner)
            return redirect()->back()->withErrors(['message' => 'Banner não existe']);

        $banner->delete();

        cache()->forget('dashboard-data');

        return redirect()->route('home_section.index')->with(['section_active_id' => $banner->home_section_id]);
    }

    private function formatDates(array $data)
    {
        $data['available_at'] = Carbon::createFromFormat('d/m/Y', $data['available_at'])->startOfDay();

        if ($data['expires_in'])
            $data['expires_in'] = Carbon::createFromFormat('d/m/Y', $data['expires_in'])->endOfDay();

        return $data;
    }

    private function makeValidate(Request $request, $section, $banner = null)
    {
        $rules = [
            'home_section_id' => $banner ? [] : 'required|exists:home_sections,id',
            'available_at' => 'required|date_format:d/m/Y',
            'expires_in' => $request->get('expires_in') ? 'date_format:d/m/Y': '',
            'image'      => [
                'image',
                $section ? Rule::dimensions()
                    ->ratio(
                        $section->dimensions ? $section->dimensions['width'] / $section->dimensions['height'] : '1/1'
                    )
                    ->maxWidth($section->dimensions['width'] * 2)
                    ->maxHeight($section->dimensions['height'] * 2) : null,
            ]
        ];

        if (is_null($banner))
            $rules['image'][] = 'required';

        $request->validate($rules);
    }
}
