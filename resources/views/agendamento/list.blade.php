@extends('layouts.base')

@section('title', 'Lista de Agendamentos')

@section('content')
    <h1 class="page-title">Lista de Agendamentos</h1>

    <div class="card">
        <div class="search-box">
            <form method="GET" action="{{ route('agendamentos.index') }}" style="display: flex; gap: 10px; width: 100%;">
                <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Buscar por cliente, serviço ou status..." style="flex: 1;">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('agendamentos.index') }}" class="btn btn-warning">Limpar</a>
            </form>
        </div>

        <div style="margin-bottom: 15px;">
            <a href="{{ route('agendamentos.create') }}" class="btn btn-success">Novo Agendamento</a>
        </div>

        @if($agendamentos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Data/Hora</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>{{ $agendamento->id }}</td>
                            <td>{{ $agendamento->cliente->nome ?? '-' }}</td>
                            <td>{{ $agendamento->servico->nome ?? '-' }}</td>
                            <td>{{ $agendamento->data_hora ? \Carbon\Carbon::parse($agendamento->data_hora)->format('d/m/Y H:i') : '-' }}</td>
                            <td>{{ $agendamento->status }}</td>
                            <td class="actions">
                                <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?');">
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
                <p>Nenhum agendamento encontrado.</p>
            </div>
        @endif
    </div>
@endsection
