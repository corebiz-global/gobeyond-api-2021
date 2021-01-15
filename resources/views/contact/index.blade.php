@extends('layouts.app')

@section('content')
<div class="card pt-3 shadow-sm">
    <div class="px-3">
        <h3>Contatos</h3>
    </div>
    <table class="table table-md table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Autoriza o envio de e-mail</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <th scope="row">{{ $contact->id }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->authorize_receiving_emails ? 'Sim' : 'Não' }}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('contacts.show', ['id' => $contact->id]) }}" class="btn btn-link btn-sm mr-2 text-dark">
                            <i class="fas fa-info-circle fa-lg"></i>
                        </a>
                        <a href="mailto:{{$contact->email}}" class="btn btn-link btn-sm text-dark" target="_blank">
                            <i class="fas fa-reply fa-lg"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="5" class="text-center">Nenhum contato encontrado</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
@endsection
