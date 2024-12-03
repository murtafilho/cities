@extends('layouts.app')

@section('title', 'Editar Problema')

@section('content')
<div>
    <h2 class="text-center my-3">Editar Problema</h2>
    <form action="{{ route('problemas.update', $problema) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $problema->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco', $problema->endereco) }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao', $problema->descricao) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            @if($problema->foto)
                <img src="{{ asset('storage/' . $problema->foto) }}" alt="Foto atual" class="img-fluid mb-2">
            @endif
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-success w-100">Atualizar</button>
    </form>
</div>
@endsection
