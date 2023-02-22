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
   
    // public function show(Question $question): View
    // {
    //     return view('questions.show', compact('question'));
    // }

    public function edit(Question $question): View
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('questions.edit', compact('question', 'categories'));
    }

    // public function update(QuestionRequest $request, Question $question): RedirectResponse
    // {
    //     $question->update($request->validated());

    //     return redirect()->route('questions.index')->with([
    //         'message' => 'successfully updated !',
    //         'alert-type' => 'info'
    //     ]);
    // }

    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Question::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
