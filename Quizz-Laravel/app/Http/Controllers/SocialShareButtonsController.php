<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;



class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        $shareComponent = \Share::page(
            'https://laravel.com/docs/10.x/readme',
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
