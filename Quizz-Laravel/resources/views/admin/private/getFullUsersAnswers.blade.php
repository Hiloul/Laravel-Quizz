@extends('layouts.app')

<h1>Toutes les réponses au questionnaires de tous les utilisateurs</h1>
<ul>
    @foreach($answers as $answer)
    <li>{{$answer->answer1}}</li>
    <li>{{$answer->answer2}}</li>
    <li>{{$answer->answer3}}</li>
    <li>{{$answer->answer4}}</li>
    <li>{{$answer->answer5}}</li>
    <li>{{$answer->email}}</li>
    @endforeach
</ul>


