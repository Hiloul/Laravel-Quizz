@extends('layouts.app')

<style>
h2{text-transform: uppercase;
text-align: center;}
.answerCard{
    display: flex;
    align-items: center;
    justify-content:space-evenly;
    flex-direction: column;
    height: 600px;
}
</style>

@section('principale')
<h2>Vos réponses à ce questionnaire: </h2>
<div class="answerCard">
    <h3>Réponse à la question 1: {{ $answer->answer1 }}</h3>
    <h3>Réponse à la question 2: {{ $answer->answer2}}</h3>
    <h3>Réponse à la question 3: {{ $answer->answer3}}</h3>
    <h3>Réponse à la question 4: {{ $answer->answer4}}</h3>
    <h3>Réponse à la question 5: {{ $answer->answer5}}</h3>
    <h3> Votre email: {{ $answer->email}}</h3>
    </div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
Laravel Quizz&copy; Hilel 2023
</div>
@endsection