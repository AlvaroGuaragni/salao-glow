@extends('base')
@section('titulo', 'Formulário Cliente')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('clientes.update', $dado->id);
        } else {
            $action = route('clientes.store');
        }
    @endphp

    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        <div class="row mb-3">
            <div class="col">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $dado->nome ?? '') }}">
                @error('nome')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $dado->cpf ?? '') }}">
                @error('cpf')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $dado->email ?? '') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="categoria_id" class="form-label">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-select">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}"
                            {{ old('categoria_id', $dado->categoria_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-8">
                <label for="imagem" class="form-label">Imagem</label>
                @php
                    $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.png';
                @endphp
                <div class="input-group">
                    <div class="input-group-text p-0" style="background-color: transparent; border: none;">
                        <img src="/storage/{{ $nome_imagem }}" width="40px" height="40px" alt="img" class="rounded-circle me-2">
                    </div>
                    <input type="file" name="imagem" id="imagem" class="form-control">
                </div>
                @error('imagem')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn text-white" style="background-color: #718c5e;">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ url('clientes') }}" class="btn text-white" style="background-color: #384236;">Voltar</a>
            </div>
        </div>
    </form>
@stop