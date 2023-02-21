<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\QuestionRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $question = Question::create([
            'name' => $request->input('name'),
        ]);
        $question->save();
        return view('/welcome')->with('message', 'Créer avec succès');
    }
    // public function store(Request $request)
    // {
    //     Question::create($request->validated());

    //     return redirect()->route('questions.index')->with([
    //         'message' => 'successfully created !',
    //         'alert-type' => 'success'
    //     ]);
    // }

    // public function show(Question $question): View
    // {
    //     return view('questions.show', compact('question'));
    // }

    // public function edit(Question $question): View
    // {
    //     $categories = Category::all()->pluck('name', 'id');

    //     return view('questions.edit', compact('question', 'categories'));
    // }

    // public function update(QuestionRequest $request, Question $question): RedirectResponse
    // {
    //     $question->update($request->validated());

    //     return redirect()->route('questions.index')->with([
    //         'message' => 'successfully updated !',
    //         'alert-type' => 'info'
    //     ]);
    // }

    // public function destroy(Question $question): RedirectResponse
    // {
    //     $question->delete();

    //     return back()->with([
    //         'message' => 'successfully deleted !',
    //         'alert-type' => 'danger'
    //     ]);
    // }

    // public function massDestroy()
    // {
    //     Question::whereIn('id', request('ids'))->delete();

    //     return response()->noContent();
    // }
}
