<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateViveiro;
use App\Models\Biometria;
use App\Models\Viveiro;
use Illuminate\Http\Request;

class ViveiroController extends Controller
{
    public readonly Viveiro $viveiro;
    public function __construct()
    {
        $this->viveiro = new Viveiro();
    }
    public function index()
    {
        $viveiros = Viveiro::select(
            'viveiros.id',
            'viveiros.name',
            'viveiros.area',
            'biometrias.id as biometria_id',
            'biometrias.date as date',
            'biometrias.shrimp_weight as gramatura'
        )->leftJoin('biometrias', function($join) {
            $join->on('viveiros.id', '=', 'biometrias.viveiro_id')->whereRaw('biometrias.date = (SELECT MAX(date) FROM biometrias WHERE viveiro_id = viveiros.id)');})->get();
        
        return view("viveiros.index", ['viveiros' => $viveiros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("viveiros.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateViveiro $request)
    {
        $created = $this->viveiro->create([
            'name' => $request->input('nome'),
            'width' => $request->input('largura'),
            'length' => $request->input('comprimento'),
            'area' => $request->input('largura') * $request->input('comprimento')
        ]);
        if($created){
            return redirect()->route("viveiros.index")->with('success', 'Viveiro Cadastrado com Sucesso' );
        }
        return redirect()->back()->with('message', 'Erro ao cadastrar' );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   

       $viveiro = Viveiro::select(
    'viveiros.id',
    'viveiros.name',
    'viveiros.area',
    'biometrias.id as biometria_id',
    'biometrias.date as date',
    'biometrias.image as image',
    'biometrias.shrimp_weight as gramatura'
)
->leftJoin('biometrias', function($join) {
    $join->on('viveiros.id', '=', 'biometrias.viveiro_id')
         ->whereRaw('biometrias.date = (SELECT MAX(date) FROM biometrias WHERE viveiro_id = viveiros.id)');
})
->where('viveiros.id', $id) 
->first(); 
 
        return view("viveiros.show", ['viveiro' => $viveiro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Viveiro $viveiro)
    {
        return view("viveiros.edit", ["viveiro" => $viveiro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateViveiro $request, string $id)
    {
        $updated = $this->viveiro->where('id', $id)->update(['name' => $request->input('nome'),
            'width' => $request->input('largura'),
            'length' => $request->input('comprimento'),
            'area' => $request->input('largura') * $request->input('comprimento')], $request->except('_token', '_method'));
        if($updated){
            return redirect()->route("viveiros.index")->with('success', 'Viveiro Editado com Sucesso' );
        }
        return redirect()->back()->with('message', 'Erro ao editar' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->viveiro->where('id', $id)->delete();
        return redirect()->route("viveiros.index")->with('success', 'Viveiro deletado com Sucesso' );
    }
}
