<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, int $serieId, Request $request)
    {
        $episodios = $temporada->episodios;
        $mensagem = $request->session()->get('mensagem');
        return view('episodios.index',compact('episodios','temporada', 'serieId', 'mensagem'));
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $assistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio) use($assistidos) {
            $episodio->status = in_array($episodio->id, $assistidos);
        });
        $temporada->push();
        $request->session()->flash('mensagem','Eposódios marcados com sucesso!');
        return redirect()->back();
    }
}
