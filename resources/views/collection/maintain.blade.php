@extends('layouts.app')

@section('content')
<div class="card py-3 shadow-sm">
    <div class="px-3">
        <a href="javascript:history.back()"><i class="fas fa-chevron-left mr-1"></i> Voltar</a>
        <h3 class="mt-3">
            Coleção - {{ $section->order }}º Seção de Vitrines
        </h3>
        <form action="{{ route('collection.update', ['section_id' => $section->id]) }}" enctype="multipart/form-data" method="POST" class="form border-top pt-2">
            @csrf
            @method('PUT')
            <div class="row border-bottom mb-4">
                <div class="col">
                    <div class="form-group">
                        <label for="collection_title">Titulo</label>
                        <input
                            type="text"
                            name="title"
                            id="collection_title"
                            required
                            value="{{ old('title', $section->collection->title ?? null) }}"
                            class="form-control @error('title') is-invalid @enderror"
                        />
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <strong>Selecione os Produtos</strong>
                </div>


                <div class="col-12">
                    <input type="search" class="form-control" placeholder="Buscar..." data-search-table="#products-table-searchable"/>
                </div>

                <table class="table table-md table-striped">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Avaliação</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Preço Prom.</th>
                        <th scope="col">Limite Parcelam.</th>
                      </tr>
                    </thead>
                    <tbody id="products-table-searchable">
                        @forelse($products as $product)
                            <tr>
                                <th>
                                    <input type="checkbox" name="product_id[]" class="custom-checkbox"
                                        value="{{ $product->id }}" @if(in_array($product->id, $selectedProducts)) checked @endif />
                                </th>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->rating }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->promotional_price }}</td>
                                <td>{{ $product->installment_limit }}x</td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="7" class="text-center">Nenhum produto encontrado</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>
</div>
@endsection
