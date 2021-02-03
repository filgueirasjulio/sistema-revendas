@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/movimentos_financeiros') }}">Listagem Movimentos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex ">
                    <span class="card-title">Movimentos Financeiros</span>
                    <a href="{{ url('/movimentos_financeiros/create') }}" class="btn btn-success ml-auto" title="Novo Movimentos_financeiro">
                        <i class="fa fa-plus" aria-hidden="true"></i> Novo
                    </a>
                </div>
                <div class="card-body">
                    <form method="GET">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="data_inicial">Data Inicial</label>
                                    <div class="input-group">
                                        <input id="data_inicio" name="data_inicial" type="text" class="form-control date" value="{{ $data_inicial }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="data_final">Data Final</label>
                                    <div class="input-group">
                                        <input id="data_final" name="data_final" type="text" class="form-control date" value="{{ $data_final }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group pt-2">
                                    <label class="control-label" for=""></label>
                                    <div class="input-group">
                                        <button class="btn btn-info m-t-xs" title="Buscar Conta"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th style="width: 270px;">Empresa</th>
                                    <th style="width: 270px;">Descricao</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movimentos_financeiros as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><span class="badge badge-{{ $item->tipo === 'entrada' ? 'success' : 'danger' }}" style="padding:10px; width:57px;">{{ ucfirst($item->tipo) }}</span></td>
                                    <td style="width: 270px;">{{ $item->empresa->nome }} ({{ $item->empresa->razao_social }})</td>
                                    <td style="width: 270px;">{{ $item->descricao }}</td>
                                    <td>R$ {{ numero_iso_para_br($item->valor) }}</td>
                                    <td>{{ data_iso_para_br($item->created_at) }}</td>
                                    <td>
                                        <a href="{{ url('/movimentos_financeiros/' . $item->id) }}" title="Detalhes"><button class="btn btn-info btn-sm" style="width: 100px;"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $movimentos_financeiros->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection