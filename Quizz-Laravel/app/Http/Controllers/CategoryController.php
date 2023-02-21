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
        return view('admin.categories.index',['categories'=>$categories]);
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

    public function show($id)
    {
        $categorie = Category::findOrFail($id);
        return view('admin.categories.show', [ 'categorie' => $categorie ]);
    }
    

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // public function update(Request $request, $id): RedirectResponse
    // {
    //     $id->update($request->validated());

    //     return redirect()->route('admin.categories.index')->with([
    //         'message' => 'successfully updated !',
    //         'alert-type' => 'info'
    //     ]);
    // }

    // public function destroy(Category $category): RedirectResponse
    // {
    //     $category->delete();

    //     return back()->with([
    //         'message' => 'successfully deleted !',
    //         'alert-type' => 'danger'
    //     ]);
    // }

    // public function massDestroy()
    // {
    //     Category::whereIn('id', request('ids'))->delete();

    //     return response()->noContent();
    // }
}
