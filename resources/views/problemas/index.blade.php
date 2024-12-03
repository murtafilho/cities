@extends('layouts.app')

@section('title', 'Lista de Problemas')

@section('content')
<div>
    <h2 class="text-center my-3">Problemas Registrados</h2>
    @if($problemas->isEmpty())
        <p class="text-center text-muted">Nenhum problema registrado ainda.</p>
    @else
        <div class="list-group">
            @foreach($problemas as $problema)
                <a href="{{ route('problemas.show', $problema) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $problema->nome }}</h5>
                        <small>{{ $problema->created_at->format('d/m/Y') }}</small>
                    </div>
                    <p class="mb-1 text-muted">{{ Str::limit($problema->descricao, 100) }}</p>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
