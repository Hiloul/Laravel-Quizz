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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Créer une catégorie') }}</h1>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Retour') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Nom: ') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Nom de la catégorie...') }}" name="name" value="{{ old('name') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Enregistrer') }}</button>
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
    .card-header{
       margin-left: 10px; 
       text-align: center;
    }
    form{display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 600px;}
</style>