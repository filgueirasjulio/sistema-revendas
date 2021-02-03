@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">
    @if($tipo == 'cliente')
    <a href="{{route('empresas.index')}}?tipo={{ $tipo }}">Listagem Clientes</a>
    @elseif($tipo == 'fornecedor')
    <a href="{{route('empresas.index')}}?tipo={{ $tipo }}">Listagem Fornecedores</a>
    @endif
</li>

<li class="breadcrumb-item">
    <a href="{{ route('empresas.show', $empresa) }}">Detalhes - {{ $empresa->nome }}</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> {{ $empresa->nome }}
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Razão Social</strong>: {{ $empresa->razao_social }} <br>
                            <strong>CNPJ/CPF</strong>:
                            @if(strlen($empresa->documento) === 11)
                            {{ mascara($empresa->documento, '###.###.###-##') }}
                            @else
                            {{ mascara($empresa->documento, '###.###.###/####-##') }}
                            @endif
                            <br>
                            <strong>IE/RG</strong>: {{ $empresa->ie_rg }} <br> <strong>
                                <strong>Saldo à {{ $empresa->tipo === 'fornecedor' ? 'pagar' : 'receber' }} </strong>
                                <strong>Nome Contato:</strong> {{ $empresa->nome_contato }}<br>
                                <strong>Celular:</strong> {{ mascara($empresa->celular, '(##)#####-####') }}<br>
                                <strong>Email:</strong> {{ $empresa->email }}<br>
                                <strong>Telefone:</strong> @if(strlen($empresa->telefone) > 7){{ mascara($empresa->telefone, '(##)####-####') }}@endif
                            </strong>: R$ {{ numero_iso_para_br($saldo->valor ?? 0) }} <br>

                            <a href="{{ route('empresas.relatorios.saldo', $empresa) }}" class="btn btn-primary btn-sm mt-4">Relatório de Saldo</a>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <address>
                                <strong>Logradouro:</strong> {{ $empresa->logradouro }}, <br>
                                <strong>Bairro:</strong> {{ $empresa->bairro }} <br>
                                <strong>Cidade: </strong> {{ $empresa->cidade }} <br>
                                <strong>Estado:</strong> {{ $empresa->estado }} <br>
                                <strong>Cep:</strong> {{ mascara($empresa->cep, '#####-###') }} <br>
                                <strong>Observações</strong>: {{ $empresa->observacao }} <br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @include('empresas.parciais.movimentos_estoque')
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('empresas.destroy', $empresa) }}?tipo={{ $empresa->tipo }}" method="post">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">
                    Apagar
                </button>
            </form>
        </div>
    </div>

</div>
@endsection