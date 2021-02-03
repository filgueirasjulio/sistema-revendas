@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/produtos') }}">Listagem Produtos</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{ url('/produtos/' . $produto->id) }}">Detalhes - Produto</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Produto {{ $produto->id }}</div>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/produtos/' . $produto->id . '/edit') }}" title="Edit Produto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('produtos' . '/' . $produto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Apagar Produto" onclick="return confirm('Tem certeza que deseja apagar?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $produto->id }}</td>
                                    </tr>
                                    <tr><th> Nome </th><td> {{ $produto->nome }} </td></tr><tr><th> Descricao </th><td> {{ $produto->descricao }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection