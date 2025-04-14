<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUsoDiario;
use App\Models\Product;
use App\Models\Viveiro;
use App\Models\UsoDiario;
use Illuminate\Http\Request;

class UsoDiarioController extends Controller
{
    public function index(Request $request)
    {
        $viveiros = Viveiro::all();
        $usoDiario = UsoDiario::all();

        return view('uso_diario.index', [
            'usoDiario' => $usoDiario,
            'viveiros' => $viveiros,
        ]);
    }

    public function create()
    {
        $viveiros = Viveiro::all();
        $produtos = Product::all();
        
        return view('uso_diario.create', compact('viveiros', 'produtos'));
    }

    public function store(StoreUpdateUsoDiario $request)
    {
        // Verifica se o cultivo ativo está disponível
        $viveiro = Viveiro::find($request->viveiro_id);
        if (!$viveiro) {
            return redirect()->back()->with('error', 'Viveiro não encontrado.');
        }
    
        $cultivoAtivo = $viveiro->cultivos()->where('status', 1)->first();
    
        if (!$cultivoAtivo) {
            // Caso não haja cultivo ativo, retorna erro
            return redirect()->back()->withInput()->with('message', 'Erro ao cadastrar: Não há cultivo ativo no viveiro.');
        }
    
        // Criação do uso diário caso o cultivo esteja ativo
        UsoDiario::create([
            'cultivo_id' => $cultivoAtivo->id,
            'viveiro_id' => $viveiro->id,
            'produto_id' => $request->produto_id,
            'data' => $request->data,
            'quantidade_utilizada' => $request->quantidade_utilizada,
        ]);
    
        // Redireciona para a tela de listagem com mensagem de sucesso
        return redirect()->route('uso_diario.index')->with('success', 'Uso diário registrado com sucesso.');
    }
    

    public function show($id)
    {
        $usoDiario = UsoDiario::findOrFail($id); 
        return view('uso_diario.show', compact('usoDiario'));
    }

    public function edit(UsoDiario $usoDiario)
    {
        $viveiros = Viveiro::all();
        $produtos = Product::all();
        return view('uso_diario.edit', [
            'usoDiario' => $usoDiario,
            'viveiros' => $viveiros,
            'produtos' => $produtos,
        ]);
    }

    public function update(StoreUpdateUsoDiario $request, UsoDiario $usoDiario)
    {
        $usoDiario->update([
            'viveiro_id' => $request->viveiro_id,
            'produto_id' => $request->produto_id,
            'data' => $request->data,
            'quantidade_utilizada' => $request->quantidade_utilizada,
        ]);

        return redirect()->route('uso_diario.index')->with('success', 'Uso diário atualizado com sucesso.');
    }

    public function destroy(UsoDiario $usoDiario)
    {
        $usoDiario->delete();
        return redirect()->route('uso_diario.index')->with('success', 'Uso diário deletado com sucesso.');
    }
}

