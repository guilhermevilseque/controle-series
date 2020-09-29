@extends('Layout')

@section('titulo')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/series">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Temporadas</li>
        </ol>
    </nav>
    @if(!empty($mensagem))
        <div class="alert alert-success">{{ $mensagem }}</div>
    @endif
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/temporadas/{{ $temporada->id }}/{{ $serie->id }}/episodios" class="">
                    Temporada {{ $temporada->numero }}
                </a>
                <span class="badge badge-primary">
                    {{ $temporada->episodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
