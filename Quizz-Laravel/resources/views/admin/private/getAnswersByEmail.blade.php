@extends('layouts.app')

@section('principale')
<h1>coucou admin</h1>

<h1>Les réponses au questionnaires de Tous les utilisateurs</h1>
<ul>
    @foreach($answers as $answer)
    <li>{{$answer->email}}</li>
    @endforeach
</ul>
<div class="answerCard">
    <h2>Les emails des utilisateurs: </h2>
    <h3>{{ $answers}}</h3>
    <h3> Votre email: {{ $answer->email}}</h3>
    </div>
@endsection

