<div class="col-xl-3 col-md-4 col-sm-6 col-12 mt-2">
    <div class="card bg-light">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('banners.edit', ['id' => $banner->id]) }}" class="btn btn-sm btn-outline-secondary mr-2">
                <i class="fas fa-pen"></i>
            </a>
            <form action="{{ route('banners.destroy', ['id' => $banner->id]) }}" method="POST" data-confirm="Deseja realmente excluir o banner ?">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
        <img src="{{ $banner->image }}" class="card-img-top" style="width: 100%; height: auto;">
        <div class="card-body">
            <p class="card-text">
                <strong>Disponível a partir de </strong> {{ $banner->available_at->format('d/m/Y')}}
            </p>
            @if($banner->expires_in)
                <p class="card-text">
                    <strong>Expira em</strong> {{ $banner->expires_in->format('d/m/Y') }}
                </p>
            @endif
        </div>
    </div>
</div>
