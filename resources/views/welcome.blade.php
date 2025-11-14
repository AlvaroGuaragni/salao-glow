@extends('base')

@section('title', 'Página Inicial - Salão Glow')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h1 class="card-title mb-3">Bem-vindo ao Sistema Salão Glow!</h1>
            <p class="card-text text-muted">
                Selecione uma das opções abaixo para continuar.
            </p>
        </div>
    </div>

    {{-- Novos Botões de Entrada --}}
    <div class="row mt-4 g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <i class="bi bi-shield-lock-fill fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Acesso do Administrador</h5>
                    <p class="card-text text-muted">
                        Gerenciamento de clientes, serviços, agendamentos e pagamentos.
                    </p>
                    {{-- Este link leva para a sua primeira tela de admin --}}
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-lg">Entrar na Gestão</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <i class="bi bi-person-fill fs-1 text-secondary mb-3"></i>
                    <h5 class="card-title">Portal do Cliente</h5>
                    <p class="card-text text-muted">
                        Área para clientes verem seus agendamentos e marcarem novos horários.
                    </p>
                    {{-- Este botão está desabilitado, pois a área do cliente ainda não foi criada --}}
                    <a href="#" class="btn btn-secondary btn-lg disabled" aria-disabled="true">Em breve</a>
                </div>
            </div>
        </div>
    </div>
@endsection