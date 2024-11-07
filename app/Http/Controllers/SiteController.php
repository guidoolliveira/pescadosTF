<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
    $products = Product::all();
    $lowestQuantityProducts = Product::orderBy('quantity', 'asc')->take(3)->get();
    $outOfStockProducts = Product::where('quantity', 0)->get();
    // $expiredproducts = Product::where('data_vencimento', '<', now())->get();
    return view('dashboard', [
        'products' => $products,
        'lowestQuantityProducts' => $lowestQuantityProducts,
        'outOfStockProducts' => $outOfStockProducts,
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
