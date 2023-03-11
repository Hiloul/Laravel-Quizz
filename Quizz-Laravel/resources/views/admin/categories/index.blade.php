@extends('layouts.app')

@section('principale')
<nav>
    <a href="/"><img src="../logoo.png" alt=""></a>
    <a href="/admin">Home'Admin</a>
    <a href="/getFullUsersAnswers">Toutes les réponses</a>
    <a href="/questions">Questions</a>
</nav>
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
    <div class="card">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Catégories') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Créer une nouvelle catégorie') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-category" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>Numero</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>

                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info">
                                        <button>Editer</button>
                                    </a>
                                    <form onclick="return confirm('En êtes-vous sur(e) ?')" class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                            <button>Supprimer</button>
                                        </button>
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
    <!-- Content Row -->

</div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection


<style>
    .card {
        text-align: center;
    }

    .card-body {
        height: 600px;
    }

    nav {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    a:hover {
        color: royalblue;
    }

    img {
        width: 50px;
        height: 50px;
        margin-left: 10px;
        margin-top: 10px;
    }

    h6 {
        text-transform: uppercase;
        text-align: center;
    }
    table{text-align: center;}
    .card-body{height: 600px;
    overflow: scroll;
    overscroll-behavior: smooth;}
</style>