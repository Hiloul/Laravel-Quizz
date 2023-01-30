@extends('layouts.app')

@section('contenu')
<h1>Les réponses au questionnaire</h1>
<ul>
    @foreach($answers as $answer)
    <li>{{$answer->answer1}}</li>
    @endforeach
</ul>
@endsection