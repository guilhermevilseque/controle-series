@extends('Layout')

@section('titulo')
    Séries
@endsection

@section('conteudo')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    @if(!empty($mensagem))
        <div class="alert alert-success">{{ $mensagem }}</div>
    @endif
    <div class="row container">
        <div class="col-lg-11">
        </div>
        <div class="col-lg-1">
            <a href="{{ route('criar_serie') }}" class="btn btn-outline-primary mb-2">Adicionar</a>
        </div>
    </div>
    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" name="nomeNovoSerie{{ $serie->id }}" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" name="atualizarNome{{ $serie->id }}" onclick="editarSerie({{ $serie->id }})">
                        <i class="material-icons md-24 mt-1">autorenew</i>
                    </button>
                    @csrf
                </div>
            </div>
            <span class="d-flex">
                <button class="btn btn-primary btn-sm" name="editarNome{{ $serie->id }}" onclick="alterarNomeSerie({{ $serie->id }})">
                     <i class="material-icons mt-1">edit</i>
                </button>
                <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-success btn-sm">
                    <i class="material-icons md-36 mt-1">library_books</i>
                </a>
                <form method="post" name="formDeletar" action="/series/remover/{{ $serie->id }}"
                      onsubmit="return confirm('Deseja confirmar a exclusão de {{ addslashes($serie->nome) }}?')">
                    @csrf
                    <button class="btn btn-danger btn-sm" name="deletarSerie">
                        <i class="material-icons md-36 mt-1">delete_forever</i>
                    </button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
    <script>
        function alterarNomeSerie(serieId) {
            if (document.getElementById('input-nome-serie-'+serieId).hasAttribute('hidden')) {
                document.getElementById('input-nome-serie-'+serieId).removeAttribute('hidden');
                document.getElementById('nome-serie-'+serieId).hidden = true;
            } else {
                document.getElementById('input-nome-serie-'+serieId).hidden = true;
                document.getElementById('nome-serie-'+serieId).removeAttribute('hidden');
            }
        }
        function editarSerie(serieId) {
            let formData = new FormData();
            const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
            const token = document.querySelector(`input[name="_token"]`).value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/series/${serieId}/editarSerie`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                alterarNomeSerie(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            });
        }
    </script>
@endsection
