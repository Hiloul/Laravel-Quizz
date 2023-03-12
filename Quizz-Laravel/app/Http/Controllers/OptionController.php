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
            'question_id' => $request->input('question_id'),
        ]);
        $option->save();
        return view('/welcome')->with('message', 'Créer avec succès');
    }

    public function show(Option $option)
    {
        return view('options.show', compact('option'));
    }

    public function edit($id)

{
    $question = Question::findOrFail($id);

    return view('options.edit', compact('option'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'option_text' => 'required|max:255',
        'question_id' => 'required'
    ]);

    Option::whereId($id)->update($validatedData);

    return redirect('/welcome')->with('success', 'Mis à jour avec succèss');
}


    public function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return redirect('/options')->with('success', 'Supprimé avec succèss');
    }

}
