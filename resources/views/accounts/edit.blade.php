@extends("layout")

@section("conteudo")
@if(!Auth::guest())
<div class="col-12">
    <p style="text-align: right">Seja bem-vindo, {{ Auth::user()->name }}</p>
</div>
@endif

<form action="{{ route('update', $account->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                Valor:
                <input type="number" step="0.01" name="balance" class="form-control" value="{{ $account->balance }}">
            </div>
        </div>
        @if($account->type === 'Debito')
        <div class="col-6">
            <div class="form-group">
                <label for="category">Tipo de entrada:</label>
                <select class="form-select" name="category" id="category">
                    <option value="Comida" {{ $account->category === 'Comida' ? 'selected' : '' }}>Comida</option>
                    <option value="Itens diarios" {{ $account->category === 'Itens diarios' ? 'selected' : '' }}>Itens
                        diários</option>
                    <option value="Roupas" {{ $account->category === 'Roupas' ? 'selected' : '' }}>Roupas</option>
                    <option value="Entretenimento" {{ $account->category === 'Entretenimento' ? 'selected' : '' }}>
                        Entretenimento</option>
                    <option value="Saude" {{ $account->category === 'Saude' ? 'selected' : '' }}>Saúde</option>
                    <option value="Educação" {{ $account->category === 'Educação' ? 'selected' : '' }}>Educação</option>
                    <option value="Luz,Agua e Gas" {{ $account->category === 'Luz,Agua e Gas' ? 'selected' : '' }}>Luz,
                        Água e Gás</option>
                    <option value="Transporte" {{ $account->category === 'Transporte' ? 'selected' : '' }}>Transporte
                    </option>
                    <option value="Comunicação" {{ $account->category === 'Comunicação' ? 'selected' : '' }}>Comunicação
                    </option>
                    <option value="Outros" {{ $account->category === 'Outros' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>
        </div>
        @else
        <div class="col-6">
            <div class="form-group">
                <label for="category">Tipo de entrada:</label>
                <select class="form-select" name="category" id="category">
                    <option value="Salario" {{ $account->category === 'Salario' ? 'selected' : '' }}>Salário</option>
                    <option value="Mesada" {{ $account->category === 'Mesada' ? 'selected' : '' }}>Mesada</option>
                    <option value="Bônus" {{ $account->category === 'Bônus' ? 'selected' : '' }}>Bônus</option>
                    <option value="Emprestimo" {{ $account->category === 'Emprestimo' ? 'selected' : '' }}>Empréstimo
                    </option>
                    <option value="Investimento" {{ $account->category === 'Investimento' ? 'selected' : '' }}>
                        Investimento</option>
                    <option value="Outros" {{ $account->category === 'Outros' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>
        </div>
        @endif
        <div class="col-6">
            <div class="form-group">
                Descrição: <input type="text" name="description" class="form-control"
                    value="{{ $account->description }}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                Data: <input type="date" name="dt_cad" class="form-control" value="{{ $account->dt_cad }}">
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
</form>

@endsection