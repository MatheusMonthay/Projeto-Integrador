@extends("layout")
@section("scriptjs")
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        $("#cpf").mask("000.000.000-00")
    }
    )
</script>
@endsection
@section("conteudo")
    <div class="col-12 mb-3">
        <h2 class="mb-3">Cadastro</h2>
    </div>
    <form action="{{route('create_user')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    Nome: <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Email: <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    CPF: <input id="cpf" type="text" name="cpf" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                Senha: <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div>
                <input type="submit" value="Cadastrar" class="btn btn-success btn-sm">
            </div>
        </div>
    </form>
@endsection