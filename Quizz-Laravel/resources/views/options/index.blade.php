@extends('layouts.app')

@section('principale')
<nav>
<a href="/"><img src="../logoo.png" alt=""></a>
<a href="/">Home</a>
<a href="/questions">Questions</a>
</nav>
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Réponse(s)') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('options.create') }}" class="btn btn-primary">
                       + <span class="text">{{ __('Répondre à des questions') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-option" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>Numero</th>
                                <th>Question</th>
                                <th>Réponse</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($options as $option)
                            <tr data-entry-id="{{ $option->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $option->question->question_text }}</td>
                                <td>{{ $option->option_text}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('options.edit', $option->id) }}" class="btn btn-info">
                                            Modifier
                                        </a>
                                        <form onclick="return confirm('Vous êtes sur(e) ? ')" class="d-inline" action="{{ route('options.destroy', $option->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
    table{text-align: center;}
</style>
