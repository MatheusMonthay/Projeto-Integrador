@extends("layout")
@section("conteudo")
    <div class="col-12">
        <h2 class="mb-3">Logar no sistema</h2>
    </div>

    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="form-group">
            Login:
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            Senha:
            <input type="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Entrar" class="btn btn-lg btn-primary">
    </form>
@endsection
