@extends('layouts.pages')

@section('contenu')
@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="row">
    <div class="col-4">
        <form method="POST" action="{{ route('etudiant.edit') }}">
            @csrf

            <input type="text" name="id" value="{{ $etudiant->id }}" hidden>
        
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" name="nom" value="{{ $etudiant->nom }}" placeholder="Entrez un nom">
                <small id="nom" class="form-text text-muted">Vous devez saisir le nom.</small>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" aria-describedby="emailHelp" name="prenom" value="{{ $etudiant->prenom }}" placeholder="Entrez un prenom">
                <small id="prenom" class="form-text text-muted">Vous devez saisir le prénom.</small>
            </div>

            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select name="classe_id" class="form-control" id="">
                    <option value="{{ $classe->id }}">{{ $classe->nom_classe }}</option>
                </select>
                <small id="classe_id" class="form-text text-muted">Vous devez sélectionner la classe.</small>
            </div>
        
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form> 
    </div>
    <div class="col-8">
        
    </div>
</div>

@endsection

