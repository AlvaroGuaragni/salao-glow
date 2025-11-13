@extends('layouts.base')

@section('title', isset($pagamento->id) ? 'Editar Pagamento' : 'Novo Pagamento')

@section('content')
    <h1 class="page-title">{{ isset($pagamento->id) ? 'Editar Pagamento' : 'Novo Pagamento' }}</h1>

    <div class="card">
        <form action="{{ isset($pagamento->id) ? route('pagamentos.update', $pagamento->id) : route('pagamentos.store') }}" method="POST">
            @csrf
            @if(isset($pagamento->id))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="agendamento_id">Agendamento *</label>
                <select id="agendamento_id" name="agendamento_id" required>
                    <option value="">Selecione um agendamento</option>
                    @foreach($agendamentos as $agendamento)
                        <option value="{{ $agendamento->id }}" {{ old('agendamento_id', $pagamento->agendamento_id) == $agendamento->id ? 'selected' : '' }}>
                            #{{ $agendamento->id }} - {{ $agendamento->cliente->nome ?? '-' }} - {{ $agendamento->servico->nome ?? '-' }} ({{ $agendamento->data_hora ? \Carbon\Carbon::parse($agendamento->data_hora)->format('d/m/Y H:i') : '-' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="valor">Valor (R$) *</label>
                <input type="number" id="valor" name="valor" step="0.01" min="0" value="{{ old('valor', $pagamento->valor) }}" required>
            </div>

            <div class="form-group">
                <label for="metodo">Método de Pagamento *</label>
                <select id="metodo" name="metodo" required>
                    <option value="">Selecione um método</option>
                    <option value="dinheiro" {{ old('metodo', $pagamento->metodo) == 'dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                    <option value="cartao_debito" {{ old('metodo', $pagamento->metodo) == 'cartao_debito' ? 'selected' : '' }}>Cartão de Débito</option>
                    <option value="cartao_credito" {{ old('metodo', $pagamento->metodo) == 'cartao_credito' ? 'selected' : '' }}>Cartão de Crédito</option>
                    <option value="pix" {{ old('metodo', $pagamento->metodo) == 'pix' ? 'selected' : '' }}>PIX</option>
                    <option value="transferencia" {{ old('metodo', $pagamento->metodo) == 'transferencia' ? 'selected' : '' }}>Transferência</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" required>
                    <option value="">Selecione um status</option>
                    <option value="pendente" {{ old('status', $pagamento->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="pago" {{ old('status', $pagamento->status) == 'pago' ? 'selected' : '' }}>Pago</option>
                    <option value="cancelado" {{ old('status', $pagamento->status) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    <option value="reembolsado" {{ old('status', $pagamento->status) == 'reembolsado' ? 'selected' : '' }}>Reembolsado</option>
                </select>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-success">{{ isset($pagamento->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                <a href="{{ route('pagamentos.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection