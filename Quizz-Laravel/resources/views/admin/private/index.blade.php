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
<h2>Utilisateurs inscrit(e)s sur le site</h2>
<ul>
    @foreach($users as $user)
    <li id="titleUl">Utilisateur</li>
    <li>{{$user->name}}</li>
    <li>{{$user->email}}</li>
    <div id="lastUl"></div>
    @endforeach
</ul>
<div class="card my-4">
        <!-- <h5 class="card-header">Recherche</h5> -->
        <form class="card-body" action="/search" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rechercher..." name="q">
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
          </span>
            </div>
        </form>
    </div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection


<style>
    .card{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
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