@extends('layouts.app')

@section('content')
<h2 class="pb-2">Dashboard</h2>

<div class="row">
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
        <div class="card text-white bg-dark card-dashboard">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <i class="fas fa-images fa-6x icon"></i>
                    </div>
                    <div>
                        <div class="text-number">{{ $bannersAvailable }}</div>
                        <div class="count-name">Banners<br/> Ativos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mt-4 mt-xl-0">
        <div class="card text-white bg-success card-dashboard">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <i class="fas fa-images fa-6x icon"></i>
                    </div>
                    <div>
                        <div class="text-number">{{ $productsInPromotion }}</div>
                        <div class="count-name">Produtos em<br/> Promoção</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mt-4 mt-sm-0">
        <div class="card text-white bg-danger card-dashboard">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <i class="fab fa-product-hunt fa-6x icon"></i>
                    </div>
                    <div>
                        <div class="text-number">{{ $productsNotInCollections }}</div>
                        <div class="count-name">Produtos sem<br/> Coleção</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mt-4 mt-lg-0">
        <div class="card text-white bg-dark card-dashboard">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <i class="fas fa-envelope fa-6x icon"></i>
                    </div>
                    <div>
                        <div class="text-number">{{ $contactsToday }}</div>
                        <div class="count-name">Solicitações<br/> de Contato</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
