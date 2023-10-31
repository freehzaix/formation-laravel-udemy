<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    //fonction pour afficher le formulaire
    public function index(){
        $classes = Classe::all();

        return view('classe.index', compact('classes'));
    }

    //Traiter le formulaire
    public function add(Request $request){
        $request->validate([
            'nom_classe' => 'required'
        ]);

        $classe = new Classe();
        $classe->nom_classe = $request->nom_classe;
        $classe->save();

        return back()->with('status', 'La classe a bien été ajouté.');

    }

    //Show pour afficher le formulaire de modification
    public function show($id){
        $classe = Classe::find($id);

        return view('classe.show', compact('classe'));
    }

    //Edit pour traiter le formulaire de modification
    public function edit(Request $request){
        $request->validate([
            'nom_classe' => 'required'
        ]);

        $classe = Classe::find($request->id);
        $classe->nom_classe = $request->nom_classe;
        $classe->update();

        return redirect()->route('classe.index')->with('status', 'La classe a bien été modifié.');
    }

    //Suppression d'une classe
    public function delete($id){
        $classe = Classe::find($id);
        $classe->delete();

        return redirect()->route('classe.index')->with('status', 'La classe a bien été supprimé.');
    }

}
