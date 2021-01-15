@extends('layouts.app')

@section('content')
<div class="card py-3 shadow-sm">
    <div class="px-3">
        <a href="javascript:history.back()"><i class="fas fa-chevron-left mr-1"></i> Voltar</a>
        <h3 class="mt-3">
            Contato #{{ $contact->id }} - {{ $contact->subject }}
        </h3>

        <div class="row mt-3">
            <div class="col">
                <p><strong>Nome:</strong> {{ $contact->name }}</p>
                <p><strong>E-mail:</strong> {{ $contact->email }}</p>
                <p><strong>Autoriza o envio de e-mail ?</strong> {{ $contact->authorize_receiving_emails ? 'Sim' : 'Não' }}</p>
            </div>
            <div class="col">
                <strong>Mensagem</strong>
                <p class="text-break">
                    {{ $contact->message }}
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
