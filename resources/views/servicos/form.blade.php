@extends('base')

@section('title', isset($servico->id) ? 'Editar Serviço' : 'Novo Serviço')

@section('content')
    <h1 class="mb-3">{{ isset($servico->id) ? 'Editar Serviço' : 'Novo Serviço' }}</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($servico->id) ? route('servicos.update', $servico->id) : route('servicos.store') }}" method="POST">
                @csrf
                @if(isset($servico->id))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $servico->nome) }}" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control">{{ old('descricao', $servico->descricao) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="number" id="preco" name="preco" class="form-control" step="0.01" min="0" value="{{ old('preco', $servico->preco) }}" required>
                </div>

                <div class="mb-3">
                    <label for="duracao" class="form-label">Duração (minutos)</label>
                    <input type="number" id="duracao" name="duracao" class="form-control" min="1" value="{{ old('duracao', $servico->duracao) }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">{{ isset($servico->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                    <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@endsection