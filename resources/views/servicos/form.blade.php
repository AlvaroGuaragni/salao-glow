@extends('layouts.base')

@section('title', isset($servico->id) ? 'Editar Serviço' : 'Novo Serviço')

@section('content')
    <h1 class="page-title">{{ isset($servico->id) ? 'Editar Serviço' : 'Novo Serviço' }}</h1>

    <div class="card">
        <form action="{{ isset($servico->id) ? route('servicos.update', $servico->id) : route('servicos.store') }}" method="POST">
            @csrf
            @if(isset($servico->id))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $servico->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao">{{ old('descricao', $servico->descricao) }}</textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço (R$) *</label>
                <input type="number" id="preco" name="preco" step="0.01" min="0" value="{{ old('preco', $servico->preco) }}" required>
            </div>

            <div class="form-group">
                <label for="duracao">Duração (minutos) *</label>
                <input type="number" id="duracao" name="duracao" min="1" value="{{ old('duracao', $servico->duracao) }}" required>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-success">{{ isset($servico->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                <a href="{{ route('servicos.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
