<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       // $categories = Category::latest()->get();
        $categories = Category::paginate(5);
        return view('category.index')->with(['c' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->process(new Category());
        $request->session()->flash('success', "Votre catégorie a été enregistré avec succes.");

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    { 
        $category = Category::findOrFail($id);
        $this->process($category);
        $request->session()->flash('success', "Votre catégorie a été modifié avec succes.");

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $request->session()->flash('danger', "Votre catégorie a été supprimée avec succes.");

        return redirect()->route('category.index');
    }

    private function process(Category $category) {
       //cette fonction a ete cree pour réduite le code 
        $request = request();
        $name = $request->input('name');
        $category->name = $name;
        //tester sil sagit d'un nouvel enregistrement
        if(!$category->exists) {
            $category->slugs = str()->slug($name);
        }
        $category->save();
    }
}
