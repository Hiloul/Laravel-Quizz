@extends('layouts.app')

@section('title')
<h1>Les réponses au questionnaire</h1>
<ul>
    @foreach($answers as $answer)
    <li>{{$answer->answer1}}</li>
    <li>{{$answer->answer2}}</li>
    <li>{{$answer->answer3}}</li>
    <li>{{$answer->answer4}}</li>
    <li>{{$answer->answer5}}</li>
    @endforeach
    <h3> Votre email: {{ $answer->email}}</h3>
</ul>
