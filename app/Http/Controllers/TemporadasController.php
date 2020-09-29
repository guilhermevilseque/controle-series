<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieid)
    {
        $serie = Serie::find($serieid);
        $temporadas = Serie::find($serieid)->temporadas;
        return view('temporadas.index', compact('serie','temporadas'));
    }
}
