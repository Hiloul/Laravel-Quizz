<?php

namespace App\Http\Controllers;

use App\Models\Character;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       $magie= mt_rand(0,14);
       $force= mt_rand(0,14);
       $agilite= mt_rand(0,14);
       $intelligence= mt_rand(0,14);
       $pv=mt_rand(20, 50);
       
        return view('quizz.create',['magie'=>$magie,'force'=>$force,'agilite'=>$agilite,'intelligence'=>$intelligence,'pv'=>$pv]);
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
            'nom' => 'required',
            'description' => 'required',
            'specialite' => 'required',
            'magie' => 'required|integer',
            'force' => 'required|integer',
            'agilite' => 'required|integer',
            'intelligence' => 'required|integer',
            'pv' => 'required|integer'
        ]);
        
        $personnage = Character::create([
            'id' => $request->input('user'),
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'specialite' => $request->input('specialite'),
            'magie' => $request->input('magie'),
            'force' => $request->input('force'),
            'agilite' => $request->input('agilite'),
            'intelligence' => $request->input('intelligence'),
            'pv' => $request->input('pv'),
            'user_id'=>Auth::user()->id,
        ]);
        $id = Auth::id();
        $personnage->save();
      
        return view('welcome')->with('message', 'Créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perso = Character::findOrFail($id);
        return view('quizz.show', [ 'perso' => $perso ]);
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
        //
    }
}
