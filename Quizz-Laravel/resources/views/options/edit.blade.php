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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Editer l'option')}}</h1>
                    <a href="{{ route('options.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Retour') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('options.update', $option->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="question">{{ __('Question') }}</label>
                        <select class="form-control" name="question_id" id="question">
                            @foreach($questions as $id => $question)
                                <option {{ $id == $option->question->id ? 'selected' : null }} value="{{ $id }}">{{ $question }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="option_text">{{ __('option de réponse') }}</label>
                        <input type="text" class="form-control" id="option_text" placeholder="{{ __('option text') }}" name="option_text" value="{{ old('option_text', $option->option_text) }}" />
                    </div>
                    <div class="form-group">
                        <label for="points">{{ __('points') }}</label>
                        <input type="number" class="form-control" id="points" placeholder="{{ __('option text') }}" name="points" value="{{ old('points', $option->points) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Sauvegarder')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection