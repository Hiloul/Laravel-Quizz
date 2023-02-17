@extends('layouts.app')

<style>
    img{width: 50px;
        height: 50px;
    margin-left: 10px;
margin-top: 10px;}
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
<a href="/"><img src="../logoo.png" alt=""></a>
<h2>Vos réponses à ce questionnaire: </h2>
<div class="answerCard">
    <h3>Réponse à la question 1: {{ $answer->answer1 }}</h3>
    <h3>Réponse à la question 2: {{ $answer->answer2}}</h3>
    <h3>Réponse à la question 3: {{ $answer->answer3}}</h3>
    <h3>Réponse à la question 4: {{ $answer->answer4}}</h3>
    <h3>Réponse à la question 5: {{ $answer->answer5}}</h3>
    <h3> Votre email: {{ $answer->email}}</h3>
    <form action="{{ route ('quizz.delete'), $answer->id }}" method="POST">
      @csrf
      @method('DELETE')
      <button class="pt-3 text-red-500 pr-3" type="submit">
        Supprimer
      </button>  
    </form>
    <div class="container mt-4">
            <h2 class="mb-5 text-center">Laravel Social Share Buttons Example</h2>
            {!! $shareComponent !!}
        </div>
    </div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
Laravel Quizz&copy; Hilel 2023
</div>
@endsection