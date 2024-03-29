@extends('layouts.app')

@section('principale')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
<nav>
<a href="/"><img src="../logoo.png" alt=""></a>
<a href="/admin">Home'Admin</a>
<a href="/categories">Catégorie(s)</a>
<a href="/questions">Questions</a>
</nav>
</h2>
<h2>Réponses au questionnaire principale</h2>
<ul>
    @foreach($answers as $answer)
    <li id="titleUl">Réponses des utilisateurs</li>
    <li>{{$answer->answer1}}</li>
    <li>{{$answer->answer2}}</li>
    <li>{{$answer->answer3}}</li>
    <li>{{$answer->answer4}}</li>
    <li>{{$answer->answer5}}</li>
    <li>{{$answer->email}}</li>
    <form onclick="return confirm('Vous êtes sur(e) ? ')" class="d-inline" action="{{ route('admin.private.destroy', $answer->id) }}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
    Supprimer
    </button>
    </form>
    <div id="lastUl"></div>
    @endforeach
</ul>
<div class="card my-4">
<form class="form-inline my-2 my-lg-0" method="get" action="{{url('/search')}}">
{{ csrf_field() }}
@method('GET')
<input class="form-control mr-sm-2" name="query" type="search" placeholder="Rechercher">
<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Go!</button>
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
    a:hover{
    color: royalblue;
}
button:hover{color: royalblue;}
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

