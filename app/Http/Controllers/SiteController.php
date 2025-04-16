<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Viveiro;
use App\Models\Funcionario;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {     


        $viveiros = Viveiro::with('latestBiometria')->get();

        $products = Product::with('estoque')->get();

      
        $lowestQuantityProducts = $products->sortBy(function ($product) {
            return $product->estoque->sum('quantity');
        })->take(3);

        $totalViveiros = Viveiro::count();
        $totalFuncionarios = Funcionario::count();

        return view('dashboard', [
            'viveiros' => $viveiros,
            'products' => $products,
            'lowestQuantityProducts' => $lowestQuantityProducts,
            'totalViveiros' => $totalViveiros,
            'totalFuncionarios' => $totalFuncionarios,
            'totalProducts' => $products->count()
        ]);
    }

}
