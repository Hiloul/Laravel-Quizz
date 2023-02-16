@extends('layouts.app')

@section('principale')
<a href="/"><img src="../logoo.png" alt=""></a>
<h2>Vos réponses au questionnaire</h2>
<ul>
    @foreach($answers as $answer)
    <li id="titleUl">Réponses:</li>
    <li>{{$answer->answer1}}</li>
    <li>{{$answer->answer2}}</li>
    <li>{{$answer->answer3}}</li>
    <li>{{$answer->answer4}}</li>
    <li>{{$answer->answer5}}</li>
    <div id="lastUl"></div>
    @endforeach
    <h3> Votre email: {{ $answer->email}}</h3>
</ul>

@if (session()->has('message'))
<div class="mx-auto w-4/5 pb-10">
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Attention
    </div>
    <div>
        {{session()->get('message')}}
    </div>

</div>
@endif


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