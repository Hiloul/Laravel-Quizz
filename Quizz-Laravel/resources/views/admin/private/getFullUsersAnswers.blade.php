@extends('layouts.app')

@section('principale')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
<nav>
<a href="/"><img src="../logoo.png" alt=""></a>
<a href="/admin">Home'Admin</a>
<a href="/getFullUsersAnswers">Toutes les réponses</a>
<a href="/getAnswersByEmail">Réponses par email</a>
</nav>
</h2>
<h2>Toutes les réponses au questionnaires de tous les utilisateurs</h2>
<ul>
    @foreach($answers as $answer)
    <li id="titleUl">Réponses des utilisateurs</li>
    <li>{{$answer->answer1}}</li>
    <li>{{$answer->answer2}}</li>
    <li>{{$answer->answer3}}</li>
    <li>{{$answer->answer4}}</li>
    <li>{{$answer->answer5}}</li>
    <li>{{$answer->email}}</li>
    <div id="lastUl"></div>
    @endforeach
</ul>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection

<style>
    a:hover{
    color: royalblue;
}
    nav{display: flex;
justify-content: space-evenly;
align-items: center;}
  img{width: 50px;
        height: 50px;
    margin-left: 10px;
margin-top: 10px;}
h2{text-transform: uppercase;
text-align: center;}
ul{display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
}
#titleUl{
    font-weight: 600;
    margin-bottom: 5px;
    margin-top: 5px;
    color: royalblue;
}
#lastUl{
   border: 0.1px dashed grey;
   width: 90%;
   color: royalblue;
}
</style>

