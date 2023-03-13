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

    
   
    public function edit(Category $category)
{
    // $category = Category::findOrFail($category);

    return view("admin.categories.edit", compact("category"));
}

// public function update(Request $request, Category $category)
// {
//     $validatedData = $request->validate([
//         'name' => 'required|max:255',
//     ]);

//     Category::whereId($category)->update($validatedData);

//     return redirect('/categories')->with('success', 'Mis à jour avec succèss');
// }
public function update(Request $request, Category $category) {
    // 1. La validation
    $rules = [
        'name' => 'bail|required|string|max:255',
        
    ];
    // Si nouvelle catégo 
    if ($request->has("category")) {
        // On ajoute la règle de validation"
        $rules["category"] = 'bail|required|max:255';
    }
    $this->validate($request, $rules);
    // 2. On upload la categorie
    if ($request->has("category")) {
        //On supprime l'ancienne catégorie
        
        $chemin_cat = $request->picture->store("categories");
    }
    // 3. On met à jour la categorie
    $category->update([
        "name" => $request->name,
        "name" => isset($chemin_cat) ? $chemin_cat : $category->picture,
    ]);
    // 4. On affiche la cetegorie
    return redirect(route("admin.categories.index", $category));
}

    

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect('/categories')->with('success', 'Supprimé avec succèss');
    }

}
