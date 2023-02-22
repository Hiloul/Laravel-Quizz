<?php

namespace App\Http\Controllers;
use App\Models\Result;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ResultRequest;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::all();

        return view('admin.results.index', compact('results'));
    }

    public function create()
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.results.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $result = Result::create($request->validated() + ['user_id' => auth()->id()]);
        $result->questions()->sync($request->input('questions', []));

        return redirect()->route('admin.results.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Result $result)
    {
        return view('admin.results.show', compact('result'));
    }


    public function destroy(Result $result)
    {
        $result->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
