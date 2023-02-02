@extends('layouts.app')

@section('principale')
<a href="/"><img src="../logoo.png" alt=""></a>
<h2>Les réponses au questionnaires de Tous les utilisateurs</h2>
<ul>
    @foreach($answers as $answer)
    <li id="titleUl">Réponses par email</li>
    <li>{{$answer->email}}</li>
    <div id="lastUl"></div>
    @endforeach
</ul>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection

<style>
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

