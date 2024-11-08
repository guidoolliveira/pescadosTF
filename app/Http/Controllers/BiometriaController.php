<?php

// app/Http/Controllers/BiometriaController.php

namespace App\Http\Controllers;

use App\Models\Biometria;
use App\Models\Viveiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiometriaController extends Controller
{
    public function index()
    {
        $biometrias = Biometria::with('viveiro')->get();
        return view('biometrias.index', compact('biometrias'));
    }

    public function create()
    {
        $viveiros = Viveiro::all(); 
        return view('biometrias.create', compact('viveiros'));
    }

    public function store(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Biometria::create([
            'weight' => $request->weight,
            'quantity' => $request->quantity,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imagePath,
            'viveiro_id' => $request->viveiro_id,
        ]);

        return redirect()->route('biometrias.index')->with('success', 'Biometria criada com sucesso.');
    }

    public function edit(Biometria $biometria)
    {
        $viveiros = Viveiro::all(); 
        return view('biometrias.edit', compact('biometria', 'viveiros'));
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

        $biometria->update([
            'weight' => $request->input("weight"),
            'quantity' => $request->input("quantity"),
            'date' => $request->input("date"),
            'description' => $request->input("description"),
            'image' => $imagePath,
            'viveiro_id' => $request->input("viveiro_id"),
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
