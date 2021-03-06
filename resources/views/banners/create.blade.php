@extends('layouts.app')

@section('content')
<div class="card py-3 shadow-sm">
    <div class="px-3">
        <a href="javascript:history.back()"><i class="fas fa-chevron-left mr-1"></i> Voltar</a>
        <h3 class="mt-3">
            Novo Banner
        </h3>

        <form action="{{ route('banners.store') }}" enctype="multipart/form-data" method="POST" class="form border-top pt-2">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="section-id">Seção</label>
                        <select class="custom-select @error('home_section_id') is-invalid @enderror" required name="home_section_id" id="section-id">
                            <option>Selecione uma opção</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id}}" @if($form['home_section_id'] == $section->id) selected @endif>
                                    {{ $section->order }}º Seção da Home
                                </option>
                            @endforeach
                        </select>
                        @error('home_section_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="available_at">Disponível a partir de</label>
                        <input
                            type="text"
                            name="available_at"
                            id="available_at"
                            readonly
                            required
                            value="{{ $form['available_at'] }}"
                            class="form-control datepicker @error('available_at') is-invalid @enderror"
                        />
                        @error('available_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="expires_in">Expira em</label>
                        <input
                            type="text"
                            name="expires_in"
                            id="expires_in"
                            value="{{ $form['expires_in'] }}"
                            readonly
                            class="form-control datepicker @error('expires_in') is-invalid @enderror"
                        />

                        @error('expires_in')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="image" id="banner-image" required lang="pt_BR">
                <label class="custom-file-label" for="banner-image">Imagem do Banner</label>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="banner-image">Imagem do Banner</label>
                <input type="file" name="image" required class="form-control-file is-invalid" id="banner-image" aria-describedby="Imagem do Banner">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>
</div>
@endsection
