@extends('layouts.app')
@section('principale')
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
                <h1 class="h3 mb-0 text-gray-800">{{ __('Editeur de catégories')}}</h1>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Retour') }}</a>
            </div>
        </div>
        <div class="card-body">
            <!-- Si Category $category -->
            @if (isset($category))
            <!-- Le formulaire est géré par"admin.categories.update" -->
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                @method('PATCH')
                @else
                <!-- Le formulaire est géré par la route "admin.categories.store" -->
                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                    @endif
                    <!-- Le token CSRF -->
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom: </label>
                        <input type="text" class="form-control" id="name" placeholder="Catégorie" name="name" value="{{ isset($category->name) ? $category->name : old('name') }}" />
                        <!-- Le message d'erreur pour "name" -->
                        @error("name")
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Enregistrer')}}</button>
                </form>
        </div>
    </div>
</div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Quizz-Laravel &copy; Hilel 2023
</div>
@endsection


<style>
    button:hover,
    a:hover {
        color: royalblue;
    }

    .container-fluid {
        text-align: center;
    }

    .card-body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 550px;
    }
</style>


