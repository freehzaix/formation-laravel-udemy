@extends('layouts.pages')

@section('contenu')
@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="row">
    <div class="col">
        <form method="POST" action="{{ route('classe.edit') }}">
            @csrf
            
            <input type="text" name="id" value="{{ $classe->id }}" hidden>

            <div class="form-group">
                <label for="nom_classe">Nom classe</label>
                <input type="text" class="form-control" id="nom_classe" value="{{ $classe->nom_classe }}" aria-describedby="emailHelp" name="nom_classe" placeholder="Entrez une classe">
                <small id="nom_classe" class="form-text text-muted">Vous devez saisir la classe.</small>
            </div>
        
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form> 
    </div>
    <div class="col">
        
    </div>
</div>

@endsection

