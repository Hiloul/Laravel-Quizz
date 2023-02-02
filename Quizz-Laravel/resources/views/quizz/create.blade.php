@extends('layouts.app')
@section('principale')
<a href="/"><img src="../logoo.png" alt=""></a>

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
    img{width: 50px;
        height: 50px;
    margin-left: 10px;
margin-top: 10px;}
    h2{font-size: x-large;
    text-align: center;
    text-transform: uppercase;}
    textarea{resize: none;
    outline: none;}
    form{outline-style: none;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 600px;}
</style>

<h2>Répondre au questionnaire</h2>

    <form action="{{ route('quizz.store') }}" method="POST">
        @csrf
    
        <!-- Question 1 -->
        <label for="answer1">Question 1 ?</label>
        <input type="text" name="answer1" id="answer1" placeholder="Ecris un mot..." />

        <!-- Question 2 -->
        <label for="answer2">Question 2 ?</label>
        <input type="text" name="answer2" id="answer2" placeholder="Ecris un mot..." />

        <!-- Question 3 -->
        <label for="answer3">Question 3 ?</label>
        <input type="text" name="answer3" id="answer3" placeholder="Ecris un mot..." />

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
        <textarea name="answer5" id="answer5" placeholder="Ecris quelque chose..." ></textarea>

        <!-- Input email -->
        <label for="email">Veuillez renseigner votre email</label>
        <input type="email" name="email" id="email" placeholder="Test@test.com..." />

        {{-- <button>Envoyer</button> --}}
        <input type="submit" value="Envoyer" id="button" />
    </form>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection
