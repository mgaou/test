<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = Product::with('category')->latest()->paginate(5);
       return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->process(new Product());
        $request->session()->flash('success', "Votre produit a été enregistré avec succes.");

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Product::with('category')->findOrFail($id);  //ramene le produit a sa categorie
        return view('product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $product=Product::findOrFail($id);
        $this->process($product);
        $request->session()->flash('success', "Votre produit a été modifié avec succes.");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        $request->session()->flash('danger', "Votre produit a été supprimé avec succes.");

        return redirect()->route('product.index');
    }

    private function process(Product $product) {
        //cette fonction a ete cree pour réduite le code 
         $request = request();
         $name = $request->input('name');
         $category_id = $request->input('category_id');
         $quantity = $request->input('quantity');
         $product->name = $name;
         $product->category_id = $category_id;
        $product->quantity=$quantity;
         //tester sil sagit d'un nouvel enregistrement
         
         $product->save();
     }
}
