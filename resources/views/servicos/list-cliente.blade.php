<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Serviços Disponíveis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

                    <form method="GET" action="{{ route('servicos.listForClient') }}" class="d-flex gap-2 mb-3">
                        <input type="text" name="busca" class="form-control" value="{{ request('busca') }}" placeholder="Buscar por nome do serviço...">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                        <a href="{{ route('servicos.listForClient') }}" class="btn btn-outline-secondary">Limpar</a>
                    </form>

                    @if($servicos->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-start">Serviço</th>
                                        <th class="text-start">Descrição</th>
                                        <th class="text-start">Preço</th>
                                        <th class="text-start">Duração (min)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($servicos as $servico)
                                        <tr>
                                            <td>{{ $servico->nome }}</td>
                                            <td>{{ $servico->descricao ?? '-' }}</td>
                                            <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                                            <td>{{ $servico->duracao }} min</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-3">
                            {{ $servicos->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">Nenhum serviço encontrado.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>