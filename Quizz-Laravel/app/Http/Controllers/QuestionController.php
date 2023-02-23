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
        ]);
        $question->save();
        return view('/welcome')->with('message', 'Créer avec succès');
    }
   
    public function edit(Question $question)
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('questions.edit', compact('question', 'categories'));
    }

    public function update(Question $question)
    {
        $question->update();

        return redirect()->route('questions.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

   
}
