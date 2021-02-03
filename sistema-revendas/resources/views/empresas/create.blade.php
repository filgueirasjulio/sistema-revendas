@extends('layouts.app')

@section('breadcrumb')
    @if($tipo == 'cliente')
    <li class="breadcrumb-item">
        <a href="{{route('empresas.index')}}?tipo={{ $tipo }}">Listagem Clientes</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('empresas.create')}}?tipo={{ $tipo }}">Novo Cliente</a>
    </li>
    @elseif($tipo == 'fornecedor')
    <li class="breadcrumb-item">
        <a href="{{route('empresas.index')}}?tipo={{ $tipo }}">Listagem Fornecedores</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('empresas.create')}}?tipo={{ $tipo }}">Novo Fornecedor</a>
    </li>
    @endif
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if($tipo == 'cliente')
                        <h3 class="card-title">Novo Cliente</h3>
                    @elseif($tipo == 'fornecedor')
                        <h3 class="card-title">Novo Fornecedor</h3>
                    @endif
                </div>

                <div class="card-body">
                    <form action="{{ route('empresas.store') }}" method="post">   
                        <input type="hidden" name="tipo" value="{{ $tipo }}">

                        @include('empresas.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection