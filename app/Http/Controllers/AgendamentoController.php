<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index(Request $request)
    {
        $query = Agendamento::with(['cliente', 'servico']);

        if ($request->has('busca')) {
            $busca = $request->input('busca');
            $query->whereHas('cliente', function($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%");
            })->orWhereHas('servico', function($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%");
            })->orWhere('status', 'like', "%{$busca}%");
        }

        $agendamentos = $query->orderBy('data_hora', 'desc')->get();

        return view('agendamento.list', compact('agendamentos'));
    }

    public function create()
    {
        $agendamento = new Agendamento();
        $clientes = Cliente::orderBy('nome')->get();
        $servicos = Servico::orderBy('nome')->get();
        return view('agendamento.form', compact('agendamento', 'clientes', 'servicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'servico_id' => 'required|exists:servicos,id',
            'data_hora' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        Agendamento::create($request->all());

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento cadastrado com sucesso!');
    }

    public function edit(Agendamento $agendamento)
    {
        $clientes = Cliente::orderBy('nome')->get();
        $servicos = Servico::orderBy('nome')->get();
        return view('agendamento.form', compact('agendamento', 'clientes', 'servicos'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'servico_id' => 'required|exists:servicos,id',
            'data_hora' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $agendamento->update($request->all());

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento removido com sucesso!');
    }
}
