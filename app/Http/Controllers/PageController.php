<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //Page d'accueil
    public function home(){
        $data = ['1', '2', '3', '4'];
        //$classe = new Classe();
        //$classe->nom_classe = "Première";
        //$classe->save();
        
        return view('pages.home', compact('data'));
    }

    //Page A propos
    public function about(){
        return view('pages.about');
    }

    //Page Service
    public function service(){
        return view('pages.service');
    }

    //Page Nous contacter
    public function contact(){
        return view('pages.contact');
    }

}
