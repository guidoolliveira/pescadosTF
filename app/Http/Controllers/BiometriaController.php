<?php

namespace App\Http\Controllers;

use App\Models\Biometria;
use App\Models\Viveiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiometriaController extends Controller
{
    public function index(Request $request)
    {
        $viveiros = Viveiro::all();
        $biometrias = Biometria::whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')->from('biometrias')->whereColumn('biometrias.viveiro_id', 'biometrias.viveiro_id')->whereIn('date', function ($subquery) {
                    $subquery->selectRaw('MAX(date)')->from('biometrias AS b')->whereColumn('b.viveiro_id', 'biometrias.viveiro_id');})->groupBy('viveiro_id');
        })->get();
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

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $fileName = now()->format('Ymd_His') . '.' . $request->image->extension();
            $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
        }
        $shrimp_weight = round($request->input('weight') / $request->input('quantity'), 2);

        Biometria::create([
           'weight' => $request->input("weight"),
            'quantity' => $request->input("quantity"),
            'date' => $request->input("date"),
            'description' => $request->input("description"),
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

    public function update(Request $request, Biometria $biometria)
    {
        $imagePath = $biometria->image;
        if ($request->hasFile('image')) {
            if ($biometria->image) {
                Storage::disk('public')->delete($biometria->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $biometria->image;
        }
        $shrimp_weight = round($request->weight / $request->quantity, 2);
        $biometria->update([
            'weight' => $request->input("weight"),
            'quantity' => $request->input("quantity"),
            'date' => $request->input("date"),
            'description' => $request->input("description"),
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
