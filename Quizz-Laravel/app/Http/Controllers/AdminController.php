<?php
namespace App\Http\Controllers;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Cache\TagSet;
use Illuminate\Http\Request;

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
      public function search(Request $request)
    {
        $search_text= $_GET['query'];
        $answers = Answer::where('email','LIKE',`%`.$search_text.`%`)->get();
        // return view('admin.private.search',compact('answers'));
        return response()->json($search_text);
    }
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
    
    public function getAnswer($id)
    {
        //Récuperation des réponses by User
        $answer=Answer::findOrFail($id);

        return response()->json(['message'=>'User Answers','adminanswer'=>$answer],200);

    }
    public function show($id)
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
        $quizz=Answer::findOrFail($id);
        $quizz->delete();
        return redirect('/getFullUsersAnswers')->with('success', 'Supprimé avec succèss');
    }

}
