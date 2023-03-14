@extends('layouts.app')

@section('principale')
<nav>
<a href="/"><img src="../logoo.png" alt=""></a>
<a href="/">Home</a>
<a href="/options">Répondre</a>
</nav>
<div class="container-fluid">
    <div class="card">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Question(s)') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('questions.create') }}" class="btn btn-primary">
                <span class="icon text-white-50"> + </span>
                <span class="text">{{ __('Créer une nouvelle question') }}</span>
                </a>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover datatable datatable-question" cellspacing="0" width="100%">
            <thead>
            <tr>
            <th width="10">
            </th>
            <th>Numéro</th>
            <th>Catégorie</th>
            <th>Question</th>
            <th>Action</th>
            </tr>
            </thead>
<tbody>
@forelse($questions as $question)
<tr data-entry-id="{{ $question->id }}">
<td>

</td>
<td>{{ $loop->iteration }}</td>
<td>{{ $question->category->name }}</td>
<td>{{ $question->question_text }}</td>
<td>
    <div class="btn-group btn-group-sm">
        <form onclick="return confirm('Etes vous sure ? ')" class="d-inline" action="{{ route('questions.destroy', $question) }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;"> Supprimer </button>
        </form>
    </div>
</td>
</tr>
@empty
<tr>
<td colspan="7" class="text-center">{{ __('Aucunes données entrées') }}</td>
</tr>
@endforelse
</tbody>
</table>
</div>
    </div>
        </div>
</div> 
<!-- Footer -->
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
    table{text-align: center;}
</style>