@extends('layouts.pages')

@section('contenu')
@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="row">
    <div class="col">
        <form method="POST" action="{{ route('classe.add') }}">
            @csrf
        
            <div class="form-group">
                <label for="nom_classe">Nom classe</label>
                <input type="text" class="form-control" id="nom_classe" aria-describedby="emailHelp" name="nom_classe" placeholder="Entrez une classe">
                <small id="nom_classe" class="form-text text-muted">Vous devez saisir la classe.</small>
            </div>
        
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form> 
    </div>
    <div class="col">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de la classe</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($classes as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->nom_classe }}</td>
                    <td>
                        <a href="{{ route('classe.show', $item->id) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ route('classe.delete', $item->id) }}" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>

@endsection

