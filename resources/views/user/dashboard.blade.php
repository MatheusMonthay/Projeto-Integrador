@extends("layout")
@section("conteudo")
@if(!Auth::guest())
<div class="col-12">
    <p style="text-align: right">Seja bem-vindo, {{Auth::user()->name}}</p>
</div>
@endif
<form action="{{ route('dashboard') }}" method="GET" class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="data_inicio">Data Início:</label>
            <input type="date" class="form-control" name="data_inicio">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="data_fim">Data Fim:</label>
            <input type="date" class="form-control" name="data_fim">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select class="form-control" name="tipo">
                <option value="">Todos</option>
                <option value="Debito">Débito</option>
                <option value="Credito">Crédito</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" name="categoria">
                <option value="">Todas</option>
                <option value="Salario">Salário</option>
                <option value="Mesada">Mesada</option>
                <option value="Bônus">Bônus</option>
                <option value="Emprestimo">Empréstimo</option>
                <option value="Investimento">Investimento</option>
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

    <div class="col-md-2">
        <br>
        <button type="submit" class="btn btn-outline-secondary">Consultar</button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Data de Lançamento</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @php
        $credit = 0;
        @endphp
        @foreach($list as $l)
        <tr class="@if($l->type === 'Debito') table-danger @else table-success @endif">
            <td>{{$l->category}}</td>
            <td>{{$l->description}}</td>
            <td>
                @if(is_string($l->dt_cad))
                {{ (new DateTime($l->dt_cad))->format("d/m/Y") }}
                @else
                {{ $l->dt_cad }}
                @endif
            </td>
            <td>{{ $l->type }}</td>
            <td> R$
                @if($l->type === 'Debito')
                -{{ $l->balance }}
                @php
                $credit -= $l->balance ;
                @endphp
                @else
                {{ $l->balance }}
                @php
                $credit += $l->balance ;
                @endphp
                @endif

            </td>
            <td>
                <a type="button" class="btn btn-warning btn-sm" href="{{ route('edit', $l->id) }}">Editar</a>
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('destroy', $l->id) }}">Excluir</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<p>Total= {{ $credit }}</p>

@endsection