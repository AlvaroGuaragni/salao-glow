@extends('layouts.base')

@section('title', isset($cliente->id) ? 'Editar Cliente' : 'Novo Cliente')

@section('content')
    <h1 class="page-title">{{ isset($cliente->id) ? 'Editar Cliente' : 'Novo Cliente' }}</h1>

    <div class="card">
        <form action="{{ isset($cliente->id) ? route('clientes.update', $cliente->id) : route('clientes.store') }}" method="POST">
            @csrf
            @if(isset($cliente->id))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $cliente->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF *</label>
                <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $cliente->cpf) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $cliente->email) }}">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" value="{{ old('telefone', $cliente->telefone) }}">
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-success">{{ isset($cliente->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection