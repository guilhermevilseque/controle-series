@extends('Layout')

@section('titulo')
    Episódios
@endsection

@section('conteudo')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/series">Home</a></li>
            <li class="breadcrumb-item"><a href="/series/{{ $serieId }}/temporadas">Temporadas {{ $temporada->numero }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Episodios</li>
        </ol>
    </nav>
    @if(!empty($mensagem))
        <div class="alert alert-success">{{ $mensagem }}</div>
    @endif
    <form action="/temporadas/{{ $temporada->id }}/episodios/assistir" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episodio->numero }}
                    <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}" {{ $episodio->status ? 'checked' : '' }}>
                </li>
            @endforeach
        </ul>
        <div class="row container">
            <div class="col col-lg-11">
            </div>
            <div class=" col col-lg-1">
                <button type="submit" class="btn btn-outline-primary mt-4"> Salvar </button>
            </div>
        </div>
    </form>
@endsection
