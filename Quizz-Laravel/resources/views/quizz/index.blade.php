@extends('layouts.app')

@section('title')
<h1>Les réponses au questionnaire</h1>
<ul>
    @foreach($answers as $answer)
    <li>{{$answer->answer1}}</li>
    @endforeach
</ul>
@endsection
@section('title', 'L\'article '.$answers)
@section('principale')
<div class="answerCard">
    <h2>Vos réponses aux questionnaires: </h2>
    <h3>Réponses: {{ $answers}}</h3>
    <h3> Votre email: {{ $answer->email}}</h3>
    </div>
@endsection
<h1>coucou user</h1>

