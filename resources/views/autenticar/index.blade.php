<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Series</title>
</head>
<body>
<div class="container">
    <div class="card card-login mx-auto mt-5" style="width:400px">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="card-header d-flex justify-content-center align-items-center">
            <i class="material-icons md-24 mt-1">lock_open</i>
            Controle de Séries
        </div>
        <div class="card-body">
            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" required min="1" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    Entrar
                </button>

                <a href="/registrar" class="btn btn-secondary mt-3 ml-3">
                    Registrar-se
                </a>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
</body>
</html>


