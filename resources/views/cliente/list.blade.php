@extends('layouts.base')

@section('title', 'Lista de Clientes')

@section('content')
    <h1 class="page-title">Lista de Clientes</h1>

    <div class="card">
        <div class="search-box">
            <form method="GET" action="{{ route('clientes.index') }}" style="display: flex; gap: 10px; width: 100%;">
                <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Buscar por nome, CPF ou email..." style="flex: 1;">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-warning">Limpar</a>
            </form>
        </div>

        <div style="margin-bottom: 15px;">
            <a href="{{ route('clientes.create') }}" class="btn btn-success">Novo Cliente</a>
        </div>

        @if($clientes->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->email ?? '-' }}</td>
                            <td>{{ $cliente->telefone ?? '-' }}</td>
                            <td class="actions">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
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
                <p>Nenhum cliente encontrado.</p>
            </div>
        @endif
    </div>
@endsection