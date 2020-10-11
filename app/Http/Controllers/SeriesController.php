<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        // echo $request->url();
        // exit();

        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');
    
        $html = "<ul>";
        foreach($series as $serie){
            $html .= "<li>$serie</li>";
        }
        $html .= "</ul>";
    
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nome = $request->get('nome'); or
        $nome = $request->nome;
        
        $serie = Serie::create([
            'nome' => $nome
        ]);

        $request->session()->flash(
            'mensagem',
            "Série {$serie->id} criada com sucesso {$serie->nome}"
        );

        return redirect()->route('listar_series');

    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash(
            'mensagem',
            "Série removida com sucesso"
        );

        return redirect()->route('listar_series');
    }
}