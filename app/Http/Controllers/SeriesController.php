<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        // echo $request->url();
        // exit();

        $series = [
            'The Expanse',
            'AHS',
            'Game of Thrones'
        ];
    
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
}