@extends('layouts.app')

@section('title', 'Création d\'un personnage')


@section('principale')

    @if ($errors->any())
        <ul>
            {{-- @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach --}}
            @if($errors->has('answer1'))
                <li>Vous n'avez pas répondu à la question 1</li>
            @endif
            @if($errors->has('answer2'))
                <li>Vous n'avez pas répondu à la question 2</li>
            @endif
            @if($errors->has('answer3'))
                <li>Vous n'avez pas répondu à la question 3</li>
            @endif
            @if($errors->has('answer4'))
                <li>Vous n'avez pas répondu à la question 4</li>
            @endif
            @if($errors->has('answer5'))
                <li>Vous n'avez pas répondu à la question 5</li>
            @endif
            @if($errors->has('email'))
                <li>Vous n'avez pas renseigné votre email</li>
            @endif
        </ul>
    @endif

<style>
    h1{font-size: x-large;
    text-align: center;}
    textarea{resize: none;
    outline: none;}
    form{outline-style: none;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;}
</style>

<h1>Répondre au questionnaire</h1>

    <form action="{{ route('quizz.store') }}" method="POST">
        @csrf
    
        <!-- Question 1 -->
        <label for="answer1">Question 1 ?</label>
        <input type="text" name="answer1" id="answer1" placeholder="Réponse 1" />

        <!-- Question 2 -->
        <label for="answer2">Question 2 ?</label>
        <input type="text" name="answer2" id="answer2" placeholder="Réponse 2" />

        <!-- Question 3 -->
        <label for="answer3">Question 3 ?</label>
        <input type="text" name="answer3" id="answer3" placeholder="Réponse 3" />

        <!-- Question 4 -->
        <label for="answer4">Question 4 ?</label>
        <select name="answer4" id="answer4">

        <option>--Choisissez votre réponse--</option>
        <option value="un">Un</option>
        <option value="deux">Deux</option>
        <option value="trois">Trois</option>
        <option value="quatre">Quatre</option>
        <option value="cinq">Cinq</option>
        </select>

        <!-- Question 5 -->
        <label for="answer5">Qu'avez vous pensé de ce test ?</label>
        <textarea name="answer5" id="answer5" placeholder="Description" ></textarea>

        <!-- Input email -->
        <label for="email">Veuillez renseigner votre email</label>
        <input type="email" name="email" id="email" placeholder="Test@test.com..." />

        {{-- <button>Envoyer</button> --}}
        <input type="submit" value="Envoyer" id="button" />
    </form>
    
    
@endsection
