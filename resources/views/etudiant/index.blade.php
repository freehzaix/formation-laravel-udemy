@extends('layouts.pages')

@section('contenu')
@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="row">
    <div class="col-4">
        <form method="POST" action="{{ route('etudiant.add') }}">
            @csrf
        
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" name="nom" placeholder="Entrez un nom">
                <small id="nom" class="form-text text-muted">Vous devez saisir le nom.</small>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" aria-describedby="emailHelp" name="prenom" placeholder="Entrez un prenom">
                <small id="prenom" class="form-text text-muted">Vous devez saisir le prénom.</small>
            </div>

            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select name="classe_id" class="form-control" id="">
                    @foreach ($classes as $item)
                        <option value="{{ $item->id }}">{{ $item->nom_classe }}</option>
                    @endforeach
                </select>
                <small id="classe_id" class="form-text text-muted">Vous devez sélectionner la classe.</small>
            </div>
        
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form> 
    </div>
    <div class="col-8">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($etudiants as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->prenom }}</td>
                    <td>{{ $item->classes->nom_classe }}</td>
                    <td>
                        <a href="{{ route('etudiant.show', $item->id) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ route('etudiant.delete', $item->id) }}" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>

@endsection

