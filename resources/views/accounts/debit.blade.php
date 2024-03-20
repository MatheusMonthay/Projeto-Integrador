@extends("layout")
@section("conteudo")
<div class="col-12 mb-3">
    <h2 class="mb-3">Adicionar Debito</h2>
</div>
<form action="{{route('add_debit')}}" method="post">
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
                    <option value="Comida">Comida</option>
                    <option value="Itens diarios">Itens diarios</option>
                    <option value="Roupas">Roupas</option>
                    <option value="Entretenimento">Entretenimento</option>
                    <option value="Saude">Saude</option>
                    <option value="Educação">Educação</option>
                    <option value="Luz,Agua e Gas">Luz,Agua e Gas</option>
                    <option value="Transporte">Transporte</option>
                    <option value="Comunicação">Comunicação</option>
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
        <input type="string" name="type" value="Debito" style="display: none;">
        <div>
            <input type="submit" value="Inserir debito" class="btn btn-success btn-sm">
        </div>
    </div>
</form>
@endsection