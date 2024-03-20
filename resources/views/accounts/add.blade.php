@extends("layout")
@section("conteudo")
<div class="col-12 mb-3">
    <h2 class="mb-3">Adicionar Saldo</h2>
</div>
<form action="{{route('add_credit')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                Valor:
                <input type="number" step="0.01" name="balance" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                Tipo de entrada: <br><select class="form-select" name="category" id="category">
                    <option value="Salario">Salario</option>
                    <option value="Mesada">Mesada</option>
                    <option value="Bônus">Bônus</option>
                    <option value="Emprestimo">Emprestimo</option>
                    <option value="Investimento">Investimento</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                Descrição: <input type="text" name="description" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                Data: <input type="date" name="dt_cad" class="form-control">
            </div>
        </div>
        <input type="string" name="id_user" value="{{Auth::user()->id}}" style="display: none;">
        <input type="string" name="type" value="Credito" style="display: none;">
        <div>
            <input type="submit" value="Inserir saldo" class="btn btn-success btn-sm">
        </div>
    </div>
</form>
@endsection