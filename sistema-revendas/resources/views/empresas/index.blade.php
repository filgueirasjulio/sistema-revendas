@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">
    @if($tipo == 'cliente')
    <a href="{{ route('empresas.index') }}">Listagem de Clientes</a>
    @elseif($tipo == 'fornecedor')
    <a href="{{ route('empresas.index') }}">Listagem de Fornecedores</a>
    @endif
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if($tipo == 'cliente')
                    <h3 class="card-title">Listagem de Clientes</h3>
                    <div class="card-tools">
                        <a href="{{route('empresas.create')}}?tipo={{ $tipo }}" class="btn btn-success">Novo Cliente</a>
                    </div>
                    @elseif($tipo == 'fornecedor')
                    <h3 class="card-title">Listagem de Fornecedores</h3>
                    <div class="card-tools">
                        <a href="{{route('empresas.create')}}?tipo={{ $tipo }}" class="btn btn-success">Novo Fornecedor</a>
                    </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="GET" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="hidden" name="tipo" value="{{ $tipo }}">
                            <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <div style="padding-top: 50px;"></div>
                    @if(count($empresas) > 0)
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                @if($tipo == 'cliente')
                                <th>Cliente</th>
                                @elseif($tipo == 'fornecedor')
                                <th>Empresa</th>
                                @endif
                                <th>Nome Contato</th>
                                <th>Celular</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empresas as $empresa)
                            <tr>
                                <td>{{$empresa->id}}</td>
                                <td>{{$empresa->nome}}</td>
                                <td>{{$empresa->nome_contato}}</td>
                                <td>{{ mascara($empresa->celular, '(##)#####-####') }}</td>
                                <td>
                                    <a href="{{ route('empresas.show', $empresa) }}" class="btn btn-primary btn-sm">Detalhes</a>
                                    <a href="{{ route('empresas.edit', $empresa) }}" class="btn btn-warning btn-sm">Atualizar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h5 class="text-center">Não há registro para ser exibido!</h5>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    {{ $empresas->appends(['tipo' => request('tipo')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection