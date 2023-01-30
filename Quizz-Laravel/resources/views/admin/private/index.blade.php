@extends('layouts.app')
@section('title')
<h1>coucou Admin</h1>


<h1>Les réponses au questionnaire</h1>
<ul>
    @foreach($users as $user)
    <li>{{$user->name}}</li>
    <li>{{$user->email}}</li>
    @endforeach
</ul>
@endsection

@section('principale')
<div class="answerCard">
    <h2>Vos réponses aux questionnaires: </h2>
    <h3>Utilisateurs: {{ $users}}</h3>
    </div>
@endsection
