@extends('layouts.base')

@section('title', 'Lista de Pagamentos')

@section('content')
    <h1 class="page-title">Lista de Pagamentos</h1>

    <div class="card">
        <div class="search-box">
            <form method="GET" action="{{ route('pagamentos.index') }}" style="display: flex; gap: 10px; width: 100%;">
                <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Buscar por cliente, método ou status..." style="flex: 1;">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('pagamentos.index') }}" class="btn btn-warning">Limpar</a>
            </form>
        </div>

        <div style="margin-bottom: 15px;">
            <a href="{{ route('pagamentos.create') }}" class="btn btn-success">Novo Pagamento</a>
        </div>

        @if($pagamentos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Agendamento</th>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Valor</th>
                        <th>Método</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagamentos as $pagamento)
                        <tr>
                            <td>{{ $pagamento->id }}</td>
                            <td>#{{ $pagamento->agendamento_id }}</td>
                            <td>{{ $pagamento->agendamento->cliente->nome ?? '-' }}</td>
                            <td>{{ $pagamento->agendamento->servico->nome ?? '-' }}</td>
                            <td>R$ {{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                            <td>{{ $pagamento->metodo }}</td>
                            <td>{{ $pagamento->status }}</td>
                            <td class="actions">
                                <a href="{{ route('pagamentos.edit', $pagamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('pagamentos.destroy', $pagamento->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este pagamento?');">
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
                <p>Nenhum pagamento encontrado.</p>
            </div>
        @endif
    </div>
@endsection