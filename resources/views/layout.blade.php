<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Finanças</title>
    @yield("scriptjs")
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
        @if(!Auth::user())
        <a href="#" class="navbar-brand">Finanças</a>
        @else
        <a href="{{ route('dashboard')}}" class="navbar-brand">Finanças</a>
        @endif
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                @if(!Auth::user())
                <a class="nav-link" href="{{ route('create')}}">Cadastrar</a>
                <a class="nav-link" href="{{route('login')}}">Login</a>
                @else
                <a href="{{ route('dashboard')}}" class="nav-link">Dashboard</a>
                <a href="{{route('credit')}}" class="nav-link">Adicionar Saldo</a>
                <a href="{{route('debit')}}" class="nav-link">Adicionar Debito</a>
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
                @endif
            </div>
        </div>
    </nav>
    <div class=" container">
        <div class="row">
            @if($message = Session::get("err"))
            <div class="col-12">
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            </div>
            @endif
            @if($message = Session::get("ok"))
            <div class="col-12">
                <div class="alert alert-success">{{$message}}</div>
            </div>
            @endif
            @yield("conteudo")
        </div>
    </div>
</body>

</html>