@extends('layouts.app')

@section('content')
    @php
    $typeLabels = [
        'banners' => 'Seção de Banners',
        'collection' => 'Seção de Vitrines'
    ];
    @endphp
    <h2 class="pb-2">Seções - Home</h2>
    @foreach($homeSections as $index => $section)
        <div class="{{ $index > 0 ? 'my-3 ' : '' }}p-3 bg-white rounded shadow-sm">
            <h6 class="pb-2 mb-0 text-dark" role="button" data-toggle="collapse" data-target="#collapse-section-{{ $index }}">
                {{ $section->order }}º - {{ $typeLabels[$section->type] }}
                @if($section->dimensions)
                    (Largura: {{ $section->dimensions['width'] }}px, Altura: {{ $section->dimensions['height'] }}px)
                @endif
            </h6>
            <div class="row collapse @if (session('section_active_id') == $section->id) show @endif" id="collapse-section-{{ $index }}">
                @if ($section->type === 'banners')
                    <div class="col-12">
                        <a href="{{ route('banners.create', ['section_id' => $section->id]) }}" class="btn btn-sm btn-primary">Novo</a>
                    </div>
                    @each('sections.home.banner-item', $section->banners, 'banner')
                @endif
                @if ($section->type === 'collection')
                    @include('sections.home.collection', ['collection' => $section->collection])
                @endif
            </div>
        </div>
    @endforeach
@endsection
