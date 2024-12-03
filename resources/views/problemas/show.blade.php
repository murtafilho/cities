@extends('layouts.app')

@section('title', $problema->nome)

@section('content')
<div>
    <h2 class="text-center my-3">{{ $problema->nome }}</h2>
    <p><strong>Endereço:</strong> {{ $problema->endereco }}</p>
    <p><strong>Descrição:</strong> {{ $problema->descricao }}</p>
    @if($problema->foto)
        <img src="{{ asset('storage/' . $problema->foto) }}" alt="Foto do problema" class="img-fluid my-3">
    @endif
    <a href="{{ route('problemas.index') }}" class="btn btn-secondary w-100">Voltar</a>
</div>
@endsection
