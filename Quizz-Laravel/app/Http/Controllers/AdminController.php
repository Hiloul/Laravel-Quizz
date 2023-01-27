<?php

namespace App\Http\Controllers;

use App\Models\Cracking;
//a faire
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{

    public function getFullUsers()
    {
        $listusers = User::all();


        return response()->json(['message' => 'User all liste.', 'user' => $listusers], 200);
    }

    //Récuperation de toutes les réponses des utilisateurs
    public function getFullUsersAnswers()
    {

        $users = DB::table('users')->join('answers', 'users.id', '=', 'answers.user_id')->get();
        

        return response()->json(['message' => 'User Answer', 'useranswer' => $users], 200);
    }
    //Récuperation des réponses par email
    public function getAnswersByEmail()
    {

        $users = DB::table('users')->join('answers', 'users.id', '=', 'answers.email_id')->get();
        

        return response()->json(['message' => 'User Answers', 'useranswer' => $users], 200);
    }
    
    //Récuperation des réponses by User_Id
    public function getAnswer($id){


        $answer=Answer::findOrFail($id);

        return response()->json(['message'=>'User Answers','adminanswer'=>$answer],200);

    }
    
    // public function getStats()
    // {
     
    // $user_id = User::all();
    //       return redirect()->action(
    //         [DashboardController::class, 'getStats'], ['user_id' => $user_id]
    //     );
    // } 


}


//creer la table answers le model Answer 
//rajouter les filtres de recherches by email by id ou by all ?

