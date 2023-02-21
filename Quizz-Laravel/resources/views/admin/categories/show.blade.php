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
<h2>Catégorie(s) créée(s): </h2>
<div class="answerCard">
    <h3>Catégorie: {{ $categorie->name }}</h3>
   
    </div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
Laravel Quizz&copy; Hilel 2023
</div>
@endsection