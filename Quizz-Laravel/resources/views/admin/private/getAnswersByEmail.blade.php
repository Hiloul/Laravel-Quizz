@extends('layouts.app')

@section('title')
<h1>coucou admin</h1>

<h1>Les réponses au questionnaires de Tous les utilisateurs</h1>
<ul>
    @foreach($answers as $answer)
    <li>{{$answer->email}}</li>
    @endforeach
</ul>
@endsection
@section('title', 'L\'article '.$answers)
@section('principale')
<div class="answerCard">
    <h2>Les réponses aux questionnaires: </h2>
    <h3>{{ $answers}}</h3>
    <h3> Votre email: {{ $answer->email}}</h3>
    </div>
@endsection

