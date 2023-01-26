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
    <p>Caracteristiques</p>
    <p>MAG: {{ $perso->magie }}</p>
    <p>FOR: {{ $perso->force }}</p>
    <p>AGI: {{ $perso->agilite }}</p>
    <p>INT: {{ $perso->intelligence }}</p>
    <p>PV: {{ $perso->pv }}</p>
    </div>
@endsection