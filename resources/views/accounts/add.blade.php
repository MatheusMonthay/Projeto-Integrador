@extends("layout")
@section("conteudo")
<div class="col-12 mb-3">
    <h2 class="mb-3">Adicionar Saldo</h2>
</div>
<form action="{{ route('add_credit') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                Valor:
                <input type="number" step="0.01" name="balance" class="form-control" required min="0">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                Tipo de entrada: <br>
                <select class="form-select" name="category" id="category" required>
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
                Descrição: <input type="text" name="description" class="form-control" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                Data: <input type="date" name="dt_cad" class="form-control" required max="{{ date('Y-m-d') }}">
            </div>
        </div>
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        <input type="hidden" name="type" value="Credito">
        <div class="col-12">
            <input type="submit" value="Inserir saldo" class="btn btn-success btn-sm">
        </div>
    </div>
</form>
@endsection