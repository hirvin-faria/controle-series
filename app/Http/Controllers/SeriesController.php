<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        // echo $request->url();
        // exit();

        $series = Serie::all();
    
        $html = "<ul>";
        foreach($series as $serie){
            $html .= "<li>$serie</li>";
        }
        $html .= "</ul>";
    
        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nome = $request->get('nome'); or
        $nome = $request->nome;
        $serie = new Serie();
        $serie->nome = $nome;
        var_dump($serie->save());
    }
}