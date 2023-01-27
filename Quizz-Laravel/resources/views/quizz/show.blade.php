@extends('layouts.app')

<style>
    
    
.cadperso{
    border: 2px black solid;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction: column;
    height: 100vh;

}
</style>

@section('title', 'L\'article '.$perso->nom)

@section('principale')
<div class="cadperso">
    <h1>Fiche personnage(s)</h1>
    <h3>Nom du personnage: {{ $perso->nom }}</h3>
    <p>Description: {{ $perso->description }}</p>
    <p> Spécialité: {{ $perso->specialite }}</p>
    </div>
@endsection