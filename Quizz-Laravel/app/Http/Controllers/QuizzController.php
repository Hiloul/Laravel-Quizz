<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Option;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers=Answer::all();
        return view('quizz.index',['answers'=>$answers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
      return view('quizz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer5' => 'required',
            'email' => 'required',
        ]);
        
        $personnage = Answer::create([
            'id' => $request->input('user'),
            'answer1' => $request->input('answer1'),
            'answer2' => $request->input('answer2'),
            'answer3' => $request->input('answer3'),
            'answer4' => $request->input('answer4'),
            'answer5' => $request->input('answer5'),
            'email' => $request->input('email'),
            'user_id'=>Auth::user()->id,
        ]);
        // $id = Auth::id();
        $personnage->save();
      
        return view('/welcome')->with('message', 'Créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = Answer::findOrFail($id);
        return view('quizz.show', [ 'answer' => $answer ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    Answer::destroy($id);
    return view('quizz.index')->with('message', 'Supprimé avec succès');
    }

    public function Quizzindex()
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
                $query->inRandomOrder()
                    ->with(['questionOptions' => function ($query) {
                        $query->inRandomOrder();
                    }]);
            }])
            ->whereHas('categoryQuestions')
            ->get();

        return view('client.test', compact('categories'));
    }

    // public function quizzStore(Request $request)
    // {
    //     $options = Option::find(array_values($request->input('questions')));

    //     $result = auth()->user()->userResults()->create([
    //         'total_points' => $options->sum('points')
    //     ]);

    //     $questions = $options->mapWithKeys(function ($option) {
    //         return [$option->question_id => [
    //                     'option_id' => $option->id,
    //                     'points' => $option->points
    //                 ]
    //             ];
    //         })->toArray();

    //     $result->questions()->sync($questions);

    //     return redirect()->route('client.results.show', $result->id);
    // }
}
