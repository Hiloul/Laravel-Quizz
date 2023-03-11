<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;

class OptionController extends Controller
{
        public function index()
    {
        $options = Option::all();

        return view('options.index', compact('options'));
    }

    public function create()
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('options.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'option_text' => 'required',
        ]);
        $option = Option::create([
            'option_text' => $request->input('option_text'),
        ]);
        $option->save();
        return view('/')->with('message', 'Créer avec succès');
    }

    public function show(Option $option)
    {
        return view('options.show', compact('option'));
    }

    public function edit(Option $option)
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('options.edit', compact('option', 'questions'));
    }

    public function update(Option $option)
    {
        $option->update();

        return redirect()->route('options.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Option $option)
    {
        $option->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Option::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
