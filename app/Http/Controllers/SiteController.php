<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Viveiro;
use App\Models\Biometria;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $products = Product::all();
        $lowestQuantityProducts = Product::orderBy('quantity', 'asc')->take(3)->get();
        $totalViveiros = Viveiro::count();
        $totalBiometrias = Biometria::count();

    return view('dashboard', [
        'viveiros' => $viveiros,
        'products' => $products,
        'lowestQuantityProducts' => $lowestQuantityProducts,
        'totalViveiros' => $totalViveiros,
        'totalBiometrias' => $totalBiometrias,
        'totalProducts' => $products->count()
    ]);
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
        //
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
