@extends('Layout')

@section('titulo')
    Adicionar Séries
@endsection

@section('conteudo')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/series">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
        </ol>
    </nav>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <form method="post">
        @csrf
            <div class="row">
                <div class="col col-6">
                    <label for="nome">Nome da Série</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Informe o nome da série">
                </div>
                <div class="col col-2">
                    <label for="qtdTemporada">Qtde. temporadas</label>
                    <input type="number" class="form-control" name="qtdTemporada" id="qtdTemporada">
                </div>
                <div class="col col-2">
                    <label for="qtdEpisodio">Qtde. episodios</label>
                    <input type="number" class="form-control" name="qtdEpisodio" id="qtdEpisodio">
                </div>
                <div class="col col-2">
                    <button type="submit" class="btn btn-outline-primary mt-4">Adicionar</button>
                </div>
            </div>
    </form>
@endsection

