@extends('layouts.base')

@section('title', 'Lista de Serviços')

@section('content')
    <h1 class="page-title">Lista de Serviços</h1>

    <div class="card">
        <div class="search-box">
            <form method="GET" action="{{ route('servicos.index') }}" style="display: flex; gap: 10px; width: 100%;">
                <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Buscar por nome ou descrição..." style="flex: 1;">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('servicos.index') }}" class="btn btn-warning">Limpar</a>
            </form>
        </div>

        <div style="margin-bottom: 15px;">
            <a href="{{ route('servicos.create') }}" class="btn btn-success">Novo Serviço</a>
        </div>

        @if($servicos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Duração (min)</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicos as $servico)
                        <tr>
                            <td>{{ $servico->id }}</td>
                            <td>{{ $servico->nome }}</td>
                            <td>{{ $servico->descricao ?? '-' }}</td>
                            <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                            <td>{{ $servico->duracao }}</td>
                            <td class="actions">
                                <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este serviço?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <p>Nenhum serviço encontrado.</p>
            </div>
        @endif
    </div>
@endsection
