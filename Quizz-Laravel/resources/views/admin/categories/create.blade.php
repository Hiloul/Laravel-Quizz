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
                        <label for="name">{{ __('name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('name') }}" name="name" value="{{ old('Nom de la catégorie...') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Enregistrer') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection

<style>
    .cardshadow{
       color: blue; 
    }
    form{display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;}
</style>