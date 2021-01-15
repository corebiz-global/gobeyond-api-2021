@if($collection)
    <div class="col-12 d-flex flex-row">
        <a href="{{ route('collection.maintain', ['section_id' => $section->id]) }}" class="btn btn-sm btn-primary mr-2">
            Editar
        </a>

        @if($collection)
            <form action="{{ route('collection.destroy', ['section_id' => $section->id]) }}" method="POST" data-confirm="Deseja realmente excluir a vitrine ?">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Apagar
                </button>
            </form>
        @endif
    </div>
    <div class="col">
        <p class="my-2"><strong>Titulo:</strong> {{ optional($collection)->title }}</p>
        <p><strong>Produtos (Total: {{ $collection->products ? $collection->products->count() : 0 }})</strong></p>


        <div class="horizontal-scroll">
            <div class="row d-flex flex-nowrap overflow-auto pb-4">
                @foreach($collection->products as $product)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                        <div class="card bg-light">

                            <div class="row no-gutters">
                                <div class="col-md-4">
                                <img src="{{ asset("storage/{$product->image}") }}" class="card-img">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body p-3">
                                    <p class="card-text">{{ $product->name }}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
<div class="col-12 d-flex flex-row">
    <a href="{{ route('collection.maintain', ['section_id' => $section->id]) }}" class="btn btn-sm btn-primary mr-2">
        Criar
    </a>
</div>
@endif

