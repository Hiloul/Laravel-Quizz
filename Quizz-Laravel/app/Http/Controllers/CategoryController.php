<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::create([
            'name' => $request->input('name'),
        ]);
        $category->save();
        return view('/welcome')->with('message', 'Créer avec succès');
    }

    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact("category"));
    }


    public function update(Request $request, Category $category)
    {
        // 1. La validation
        $request->validate([
            'name' => 'required',
        ]);
        // 2. On met à jour la catégorie
        $category->update([
            "name" => $request->name,
        ]);
        // 3. On affiche les catégories
        return redirect(route("admin.categories.index", $category->name));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Supprimé avec succèss');
    }
}
