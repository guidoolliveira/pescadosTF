<?php

namespace App\Http\Controllers;

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
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->viveiro->create([
            'name' => $request->input('name')
        ]);
        if($created){
            return redirect()->route("dashboard")->with('success', 'Viveiro Cadastrado com Sucesso' );
        }
        return redirect()->back()->with('message', 'Erro ao cadastrar' );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
