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
                <form action="{{ route('admin.categories.update', $category->id) }}" method="PUT">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nom: </label>
                        <input type="text" class="form-control" id="name" placeholder="Catégorie" name="name" value="{{ old('name', $category->name) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Enregistrer')}}</button>
                </form>
            </div>
        </div>
    <!-- Content Row -->
</div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection


<style>
    button:hover, a:hover{color: royalblue;}
    .container-fluid{text-align: center;}
    .card-body{display:flex;
    justify-content: center;
    align-items: center;
    height: 550px;}
</style>