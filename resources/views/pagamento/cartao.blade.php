@extends('layouts.app')

@section('pagamento')

<div class="container mt-4 pb-5">
    <div class="row justify-content-md-start ">
        <p class="text-left"><a href="{{ URL::previous() }}"><i class="fas fa-chevron-left" id="voltar"></i></a>
        </p>  
    </div>
    <div class="row">
        <div class="col-12 mt-5">
            <span class="itens">{{ $plano->nome }}</span>
            <span class="float-right titulo-plano">{{ $plano->valorParcelas }}</span>
        </div>
    </div>
    <div class="row justify-content-md-start mt-5">
        <h4 class="titulo">Dados do Cartão</h4>
    </div>
    
    <form action="{{ route('salvarCartao')}}" method="POST">
        @csrf
        <div class="row mt-4">
            <div class="col-12">
                <div class="form-group">
                    <label class="label" for="numeroCartao">Numero do Cartão</label>
                    <input type="text" class="form-control align-middle" id="numeroCartao" name="numeroCartao">
                </div>
                <div class="form-group">
                    <label class="label" for="nomeTitular">Nome do Titular</label>
                    <input type="text" class="form-control" name="nomeTitular" id="nomeTitular">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="label" for="validadeCartao">Validade do cartão (MM/AA)</label>
                    <input type="text" class="form-control align-middle" name="validadeCartao" id="validadeCartao" maxlength="7">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="label" for="codigoSeguranca">Código segurança (CVV)</label>
                    <input type="text" class="form-control" name="codigoSeguranca" id="codigoSeguranca">
                </div>
            </div>
        </div>
        <input type="hidden" name="clienteId" value="{{ $clienteId }}">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center btn-padding">
                    <input class="btn btn-primary btn-lg" type="submit" value="Continuar" id="cartaoSubmit" disabled >
                </div>
            </div>
        </div>
    </form>
    
    <div class="row mt-4">
        
    </div>
    
    
</div>

@endsection