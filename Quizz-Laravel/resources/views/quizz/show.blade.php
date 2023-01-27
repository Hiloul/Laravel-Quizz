@extends('layouts.app')

<style>
    
    
.answerCard{
    border: 2px black solid;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction: column;
    height: 100vh;

}
</style>

@section('title', 'L\'article '.$answer->email)

@section('principale')
<div class="answerCard">
    <h2>Vos réponses à ce questionnaire: </h2>
    <h3>Réponse à la question 1: {{ $answer->answer1 }}</h3>
    <h3>Réponse à la question 2: {{ $answer->answer2}}</h3>
    <h3>Réponse à la question 3: {{ $answer->answer3}}</h3>
    <h3>Réponse à la question 4: {{ $answer->answer4}}</h3>
    <h3>Réponse à la question 5: {{ $answer->answer5}}</h3>
    <h3> Votre email: {{ $answer->email}}</h3>
    </div>
@endsection