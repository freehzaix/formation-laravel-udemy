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

}
