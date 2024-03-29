<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions=Question::all();
        return view('questions.index',['questions'=>$questions,]);
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required',
        ]);
        $question = Question::create([
            'question_text' => $request->input('question_text'),
            'category_id' => $request->input('category_id'),
        ]);
        $question->save();
        return view('/welcome')->with('message', 'Créer avec succès');
    }
   
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        
        return redirect('/questions')->with('success', 'Supprimé avec succèss');
        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

   
}
