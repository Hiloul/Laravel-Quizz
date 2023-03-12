<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;



class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Vôtre texte ici',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
        
        return view('posts', compact('shareComponent'));
    }
}
