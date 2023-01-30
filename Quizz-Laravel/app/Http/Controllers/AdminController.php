<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        //Liste des utilisateurs inscrits
        $users=User::all();
        return view('admin.private.index',['users'=>$users]);
    }
    
    public function getFullUsersAnswers()
    {
        //Récuperation de toutes les réponses des utilisateurs
        $answers=Answer::all();
        

        return view('admin.private.getFullUsersAnswers',['answers'=>$answers]);
    }
    
    public function getAnswersByEmail()
    {
        //Récuperation des réponses par email
        $answers = DB::table('answers')->select('email')->get();
        
        return view('admin.private.getAnswersByEmail',['answers'=>$answers]);
    }
    
    
    public function getAnswer($id)
    {
        //Récuperation des réponses by User
        $answer=Answer::findOrFail($id);

        return response()->json(['message'=>'User Answers','adminanswer'=>$answer],200);

    }
    public function show($id)
    {
        // $answer = Answer::findOrFail($id);
        // return view('quizz.show', [ 'answer' => $answer ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
