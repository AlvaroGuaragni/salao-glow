@extends('base')
@section('titulo', 'Clientes')
@section('conteudo')

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('clientes.create') }}" class="btn text-white mb-3" style="background-color: #718c5e;">
    Novo Cliente
</a>

<form action="{{ route('clientes.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="busca" class="form-control" placeholder="Buscar cliente por nome ou CPF..." value="{{ request('busca') }}" style="border-radius: 5px;">
        <button class="btn text-white" type="submit" style="background-color: #718c5e; border-radius: 5px;">Buscar</button>
    </div>
</form>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">E-mail</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>
                    @if($cliente->imagem)
                        <img src="{{ asset('storage/' . $cliente->imagem) }}" alt="Imagem do Cliente" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                        <div class="bg-light rounded-circle border" style="width: 80px; height: 80px;"></div>
                    @endif
                </td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->categoria_id }}</td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $clientes->links() }}