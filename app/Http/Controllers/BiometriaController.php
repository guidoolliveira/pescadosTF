<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBiometria;
use App\Models\Biometria;
use App\Models\Viveiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiometriaController extends Controller
{
    public function index(Request $request)
    {
        $viveiros = Viveiro::all();
        $biometrias = Biometria::all();
        return view('biometrias.index', [
            'biometrias' => $biometrias,
            'viveiros' => $viveiros,
        ]);
    }

    public function create()
    {
        $viveiros = Viveiro::all(); 
        return view('biometrias.create', [
            'viveiros' => $viveiros,
        ]);
    }

    public function store(StoreUpdateBiometria $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Gera um nome único para o arquivo
            $fileName = now()->format('Ymd_His') . '.' . $request->image->extension();
            // Armazena o arquivo na pasta 'images' no diretório público
            $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
        }

        $shrimp_weight = round($request->input('peso') / $request->input('quantidade'), 2);

        Biometria::create([
            'weight' => $request->input("peso"),
            'quantity' => $request->input("quantidade"),
            'date' => $request->input("data"),
            'description' => $request->input("observacao"),
            'image' => $imagePath,
            'viveiro_id' => $request->input("viveiro_id"),
            'shrimp_weight' => $shrimp_weight
        ]);

        return redirect()->route('biometrias.index')->with('success', 'Biometria criada com sucesso.');
    }

    public function show($id)   
    {
        $biometria = Biometria::with('viveiro')->findOrFail($id); 
        return view('biometrias.show', compact('biometria'));
    }

    public function edit(Biometria $biometria)
    {
        $viveiros = Viveiro::all(); 
        return view('biometrias.edit', [
            'biometria' => $biometria,
            'viveiros' => $viveiros,
        ]);
    }

    public function update(StoreUpdateBiometria $request, Biometria $biometria)
    {
        $imagePath = $biometria->image;
        if ($request->hasFile('image')) {
            if ($biometria->image) {
                Storage::disk('public')->delete($biometria->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $shrimp_weight = round($request->input('peso') / $request->input('quantidade'), 2);
        $biometria->update([
            'weight' => $request->input("peso"),
            'quantity' => $request->input("quantidade"),
            'date' => $request->input("data"),
            'description' => $request->input("observacao"),
            'image' => $imagePath,
            'viveiro_id' => $request->input("viveiro_id"),
            'shrimp_weight' => $shrimp_weight
        ]);

        return redirect()->route('biometrias.index')->with('success', 'Biometria atualizada com sucesso.');
    }

    public function destroy(Biometria $biometria)
    {
        if ($biometria->image) {
            Storage::disk('public')->delete($biometria->image);
        }

        $biometria->delete();
        return redirect()->route('biometrias.index')->with('success', 'Biometria deletada com sucesso.');
    }
}
