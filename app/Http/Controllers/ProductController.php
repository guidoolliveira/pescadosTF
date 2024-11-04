<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    public readonly Product $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $products = Product::all();
        return view("product.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("product.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->product->create([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'validity' => $request->input('validity')
        ]);
        if($created){
            return redirect()->route("products.index")->with('success', 'Produto Cadastrado com Sucesso' );
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
    public function edit(Product $product)
    {
        return view("product.edit", ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->product->where('id', $id)->update($request->except('_token', '_method'));
        if($updated){
            return redirect()->route("products.index")->with('success', 'Produto Editado com Sucesso' );
        }
        return redirect()->back()->with('message', 'Erro ao editar' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->product->where('id', $id)->delete();
        return redirect()->route("products.index")->with('success', 'Produto deletado com Sucesso' );
    }
}
