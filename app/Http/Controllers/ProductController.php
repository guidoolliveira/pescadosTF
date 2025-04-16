<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUpdateProduto;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Estoque;

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
    foreach ($products as $product) {
            $product->estoque = $product->estoque()
                ->orderBy('validity')
                ->orderBy('created_at')
                ->get();

            foreach ($product->estoque as $e) {
                $e->historico = $e->historico()->get();
            }
        }
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
    $request->validate([
        'nome' => 'required|string|max:255', 
        'peso' => 'required|numeric|gt:0|digits_between:1, 2',
        'quantidade' => 'required|numeric|min:1',
        'lote'=> 'required|string|max:50',
        'validade'=> 'required|date_format:Y-m-d|after:today',]);
    $product = $this->product->create([
        'name'   => $request->input('nome'),
        'weight' => $request->input('peso'),
    ]);

    if ($product) {
        $estoque = new Estoque();
        $estoque->product_id = $product->id; 
        $estoque->quantity   = $request->input('quantidade');
        $estoque->lot        = $request->input('lote');
        $estoque->validity   = $request->input('validade');
        
        if ($estoque->save()) {
            return redirect()->route('products.index')
                             ->with('success', 'Produto e entrada de estoque cadastrados com sucesso!');
        }
        return redirect()->back()->with('message', 'Produto criado, mas erro ao adicionar entrada no estoque!');
    }

    return redirect()->back()->with('message', 'Erro ao cadastrar produto!');
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
    public function update(StoreUpdateProduto $request, string $id)
    {
        $updated = $this->product->where('id', $id)->update([
            'name' => $request->input('nome'),
            'weight' => $request->input('peso'),
        ], $request->except('_token', '_method'));
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
