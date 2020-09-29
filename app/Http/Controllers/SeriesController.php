<?php


namespace App\Http\Controllers;



use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Temporada;
use Illuminate\Http\Request;
use App\Serie;
use Illuminate\Support\Facades\DB;


class SeriesController extends Controller
{
    public function index(Request $request){

        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = '';
        DB::transaction(function () use ($request, &$serie) {
            $serie = Serie::create(['nome' => $request->nome]);
            $qtdTemporadas = $request->qtdTemporada;
            for ($i = 1; $i <= $qtdTemporadas; $i++) {
                $temporada = $serie->temporadas()->create(['numero' => $i]);

                for ($j = 1; $j <= $request->qtdEpisodio; $j++) {
                    $temporada->episodios()->create(['numero' => $j]);
                }
            }
        });
        $request->session()->flash('mensagem', "$serie->nome salva com sucesso!");

        return redirect()->route('series');
    }

    public function destroy(Request $request)
    {
        $serieNome = '';
        DB::transaction(function () use ($request, &$serieNome){
            $serie = Serie::find($request->id);
            $serieNome = $serie->nome;
            $serie->temporadas->each(function (Temporada $temporada){
                $temporada->episodios->each(function (Episodio $episodio){
                    $episodio->delete();
                });
                $temporada->delete();
            });
            $serie->delete();
        });
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série $serieNome excluida com sucesso!");

        return redirect()->route('series');
    }

    public function edit(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $novoNome = $request->nome;
        $serie->nome = $novoNome;
        $serie->save();
    }

}
