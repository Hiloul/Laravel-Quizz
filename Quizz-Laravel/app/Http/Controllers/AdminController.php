<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.private.index',['users'=>$users]);
    }

    public function create(Request $request)
    {
        return view('admin.create');
    }

    //Récuperation de toutes les réponses des utilisateurs
    public function getFullUsersAnswers()
    {
        $answers=Answer::all();
        

        return view('admin.private.getFullUsersAnswers',['answers'=>$answers]);
    }
    //Récuperation des réponses par email
    public function getAnswersByEmail()
    {

        $answers = DB::table('answers')->select('email')->get();
        
        return view('admin.private.getAnswersByEmail',['answers'=>$answers]);
    }
    
    //Récuperation des réponses by User_Id
    public function getAnswer($id){


        $answer=Answer::findOrFail($id);

        return response()->json(['message'=>'User Answers','adminanswer'=>$answer],200);

    }
    
    public function destroy(Answer $result): RedirectResponse
    {
        $result->delete();

        return back()->with([
            'message' => 'Effacé avec succes !',
            'alert-type' => 'danger'
        ]);
    }

}
//Routes faites verfier