@extends('layouts.app')
@section('principale')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <style>
            div#social-links {
                margin: 0 auto;
                max-width: 500px;
            }
            div#social-links ul li {
                display: inline-block;
            }          
            div#social-links ul li a {
                padding: 20px;
                border: 1px solid #ccc;
                margin: 1px;
                font-size: 30px;
                color: #222;
                background-color: #ccc;
            }
        </style>
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
<nav>
<a href="/"><img src="../logoo.png" alt=""></a>
<a href="/admin">Home'Admin</a>
<a href="/getFullUsersAnswers">Toutes les réponses</a>
<a href="/getAnswersByEmail">Réponses par email</a>
</nav>
</h2>
<h2>Utilisateurs inscrit(e)s sur le site</h2>
<ul>
    @foreach($users as $user)
    <li id="titleUl">Utilisateur</li>
    <li>{{$user->name}}</li>
    <li>{{$user->email}}</li>
    <div id="lastUl"></div>
    @endforeach
</ul>
<div class="container mt-4">
            <h2 class="mb-5 text-center">Laravel Social Share Buttons Example</h2>
            {!! $shareComponent !!}
        </div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection


<style>
    nav{display: flex;
justify-content: space-evenly;
align-items:center ;}
a:hover{
    color: royalblue;
}
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