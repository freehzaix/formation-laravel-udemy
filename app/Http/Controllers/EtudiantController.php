<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //Vue Etudiant
    public function index()
    {
        $classes = Classe::all();
        $etudiants = Etudiant::all();

        return view('etudiant.index', compact('classes', 'etudiants'));
    }

    //Post Etudiant
    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe_id' => 'required',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe_id = $request->classe_id;
        $etudiant->save();

        return back()->with('status', 'L\'étudiant a bien été ajouté.');

    }

    //La fonction show pour afficher la page de modification
    //d'un étudiant
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        $classe = Classe::find($etudiant->classe_id);

        return view("etudiant.show", compact('etudiant', 'classe'));
    
    }

    //le fonction edit pour modifier les informations d'un étudiant
    public function edit(Request $request)
    {
        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe_id = $request->classe_id;
        $etudiant->update();

        return back()->with('status', 'L\'étudiant a bien été modifié.');
    }

}
