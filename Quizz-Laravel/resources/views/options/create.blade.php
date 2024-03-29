@extends('layouts.app')

@section('principale')
<nav>
<a href="/"><img src="../logoo.png" alt=""></a>
<a href="/">Home</a>
<a href="/options">Réponses</a>
<a href="/questions">Questions</a>
</nav>
<div class="container-fluid">

    <!-- Page Heading -->
    

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Répondre à une question') }}</h1>
                    <a href="{{ route('options.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Retour') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('options.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question">{{ __('Question') }}</label>
                        <select class="form-control" name="question_id" id="question">
                            @foreach($questions as $id => $question)
                                <option value="{{ $id }}">{{ $question }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="option_text">{{ __('Réponse') }}</label>
                        <input type="text" class="form-control" id="option_text" placeholder="{{ __('votre réponse') }}" name="option_text" value="{{ old('option_text') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Valider') }}</button>
                </form>
            </div>
        </div>
</div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection
<style>
    .card{text-align: center;}
    .card-body{height: 600px;
    overflow: scroll;
    overscroll-behavior: smooth;}
    nav{display: flex;
    justify-content: space-evenly;
    align-items: center;}
    a:hover{color: royalblue;}
    img{height: 50px;
    width: 50px;}
</style>