@extends('layouts.app')

@section('title', 'Création d\'un personnage')


@section('principale')

    @if ($errors->any())
        <ul>
            {{-- @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach --}}
            @if($errors->has('nom'))
                <li>Erreur, le pseudo est vide</li>
            @endif
            @if($errors->has('description'))
                <li>Erreur, description vide</li>
            @endif
            @if($errors->has('specialite'))
                <li>Erreur, spécialité non choisie</li>
            @endif
        </ul>
    @endif

<style>
    h1{font-size: x-large;
    text-align: center;}
    textarea{resize: none;
    outline: none;}
    form{outline-style: none;}
</style>

<div id="userList"></div>

<h1>Création d'un personnage</h1>


    <form action="{{ route('quizz.store') }}" method="POST">
        @csrf
    
        <label for="nom">Pseudo :</label>
        <input type="text" name="nom" value="" id="nom" placeholder="Votre pseudo" />
        <label for="description">Description :</label>
        <textarea name="description" id="description" placeholder="Description" ></textarea>
        
        <label for="specialite">Specialite :</label>
        <select name="specialite" value="" id="specialite">

        <option value="">--Choisissez votre personnage--</option>
        <option value="guerrier">Guerrier</option>
        <option value="mage">Mage</option>
        <option value="druide">Druide</option>
        <option value="assassin">Assassin</option>
        <option value="berserker">Berserker</option>
        <option value="archer">Archer</option>
        </select>
        
        <label for="magie">Magie :</label>
        <input type="number" name="magie" readonly value="{{$magie}}" placeholder="MAG" id="magie">
        <label for="force">Force :</label>
        <input type="number" name="force" readonly value="{{$force}}" placeholder="FOR" id="force">
        <label for="agilite">Agilité :</label>
        <input type="number" name="agilite" readonly value="{{$agilite}}" placeholder="AGI" id="agilite">
        <label for="agilite">Intelligence :</label>
        <input type="number" name="intelligence" readonly value="{{$intelligence}}" placeholder="INT" id="intelligence">
        <label for="pv">PV :</label>
        <input v-model="generate" type="number" name="pv" readonly value="{{$pv}}" placeholder="pv" id="pv">
        <button @click="genererInt">Générer</button>
        {{-- <button>Envoyer</button> --}}
        <input type="submit" value="Envoyer" id="button" />
    </form>
   
    
  

<script defer src="{{asset('/js/scriptcard.js')}}"></script>
@endsection
