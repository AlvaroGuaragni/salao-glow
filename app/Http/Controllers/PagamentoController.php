<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index(Request $request)
    {
        $query = Pagamento::with('agendamento.cliente', 'agendamento.servico');

        if ($request->has('busca')) {
            $busca = $request->input('busca');
            $query->whereHas('agendamento.cliente', function($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%");
            })->orWhere('metodo', 'like', "%{$busca}%")
              ->orWhere('status', 'like', "%{$busca}%");
        }

        $pagamentos = $query->orderBy('created_at', 'desc')->get();

        return view('pagamento.list', compact('pagamentos'));
    }

    public function create()
    {
        $pagamento = new Pagamento();
        $agendamentos = Agendamento::with('cliente', 'servico')->orderBy('data_hora', 'desc')->get();
        return view('pagamento.form', compact('pagamento', 'agendamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agendamento_id' => 'required|exists:agendamentos,id',
            'valor' => 'required|numeric|min:0',
            'metodo' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        Pagamento::create($request->all());

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento cadastrado com sucesso!');
    }

    public function edit(Pagamento $pagamento)
    {
        $agendamentos = Agendamento::with('cliente', 'servico')->orderBy('data_hora', 'desc')->get();
        return view('pagamento.form', compact('pagamento', 'agendamentos'));
    }

    public function update(Request $request, Pagamento $pagamento)
    {
        $request->validate([
            'agendamento_id' => 'required|exists:agendamentos,id',
            'valor' => 'required|numeric|min:0',
            'metodo' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $pagamento->update($request->all());

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento atualizado com sucesso!');
    }

    public function destroy(Pagamento $pagamento)
    {
        $pagamento->delete();
        return redirect()->route('pagamentos.index')->with('success', 'Pagamento removido com sucesso!');
    }
}
