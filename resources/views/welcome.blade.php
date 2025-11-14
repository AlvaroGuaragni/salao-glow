@extends('base')
@section('title', 'Página Inicial - Salão Glow')

@section('content')
    <div class="card shadow-sm border-0" style="background-color: #f084daff; padding: 25px;">
        <div class="card-body">
            <h1 class="card-title mb-3">Bem-vindo ao nosso site do Salão Glow!</h1>
            <p class="card-text text-muted">
                Selecione uma das opções abaixo para continuar.
            </p>
        </div>
    </div>

    <div class="row mt-4 g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <i class="bi bi-shield-lock-fill fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Acesso do Administrador</h5>
                    <p class="card-text text-muted">
                        Gerenciamento dos clientes, serviços, agendamentos e pagamentos.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg" style="background-color: #cf38b1ff;">
                        Entrar na Gestão
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <i class="bi bi-person-fill fs-1 text-success mb-3"></i>
                    <h5 class="card-title">Portal do Cliente</h5>
                    <p class="card-text text-muted">
                        Faça login ou registre-se para ver seus agendamentos.
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="{{ route('login') }}" class="btn btn-success btn-lg px-4 gap-3" style="background-color: #cf38b1ff;">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg px-4" style="background-color: #f084daff;">
                            Registrar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection