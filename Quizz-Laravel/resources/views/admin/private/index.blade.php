@extends('layouts.app')
@section('principale')
<h1>Utilisateurs inscrits sur le site</h1>
<ul>
    @foreach($users as $user)
    <li>{{$user->name}}</li>
    <li>{{$user->email}}</li>
    @endforeach
</ul>
@endsection


