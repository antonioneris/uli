@extends('layouts.app')

@section('pagamento')
@php
    if(empty($plano)) redirect('/pagamento/planos');

@endphp

<div class="container mt-4 pb-5">
    <div class="row justify-content-md-start ">
        <p class="text-left"><a href="{{ URL::previous() }}"><i class="fas fa-chevron-left" id="voltar"></i></a>
        </p>  
    </div>
    <div class="row">
        <div class="col-12 mt-5">
            <span class="itens">@isset($plano) {{ $plano->nome }} @endisset</span>
            <span class="float-right titulo-plano">{{ $valorParcelas }}</span>
        </div>
    </div>
    <div class="row justify-content-md-start mt-5">
        <h4 class="titulo">Seus Dados</h4>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <form  method="POST" action="{{ route('salvarCliente')}}">
                @csrf
                <input type="hidden" name="planoNome" value="@isset($plano) {{ $plano->nome }} @endisset">
                <input type="hidden" name="valorParcelas" value="{{ $valorParcelas }}">
                <div class="form-group">
                    <label class="label" for="nome">Nome Completo</label>
                    <input type="text" class="form-control align-middle" id="nome" name="nome" minlength="8" maxlength="150" required>
                </div>
                <div class="form-group">
                    <label class="label" for="dataNascimento">Data de Nascimento</label>
                    <input type="text" class="form-control" id="dataNascimento" name="dataNascimento" required>
                </div>
                <div class="form-group">
                    <label class="label" for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
                <div class="form-group">
                    <label class="label" for="telefone">Telefone com DDD</label>
                    <input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" name="telefone" required maxlength="15">
                </div>

                <div class="row justify-content-center btn-padding">
                    <input class="btn btn-primary btn-lg shadow" type="submit" value="Continuar" id="clienteSubmit" disabled>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection