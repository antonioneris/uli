@extends('layouts.app')

@section('pagamento')

<div class="container mt-4 pb-5">
    <div class="row justify-content-md-start ">
        <p class="text-left"><i class="fas fa-chevron-left" id="voltar"></i>
        </p>  
    </div>
    <div class="row justify-content-md-start mt-3">
        <h4 class="titulo">Pagamento</h4>
    </div>
    <div class="row ">
        <div class="card col-md active">
            <div class="card-body">
                <div class="row ">
                    <span class="titulo-plano">Plano Mensal</span>
                </div>
                <div class="row mt-2">
                    <div class="col-12 pl-0 itens">
                        <span class="float-left mb-0">Adesão</span>
                        <span class="float-right ">R$ 499,00</span>
                    </div>
                    
                    <div class="col-12 pl-0 mb-1 mt-1 itens">
                        <span class="float-left mb-0">+ Mensalidade</span>
                        <span class="float-right">R$ 49,90</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="card col-md">
            <div class="card-body">
                <div class="row ">
                    <span class="titulo-plano">Plano Anual</span>
                </div>
                <div class="row mt-2">
                    <div class="col-12 pl-0 itens">
                        <span class="float-left mb-0">Adesão</span><b class="oferta-desconto align-middle">10% Off</b>
                        <b class="oferta"><del class="align-middle">de R$499,00 por</del></b><span class="float-right ">R$ 499,00</span>
                    </div>
                    
                    <div class="col-12 pl-0 mb-1 mt-1 itens">
                        <span class="float-left mb-0">+ Anuidade</span><b class="oferta-desconto align-middle">40% off </b>
                        <span class="float-right">R$ 49,90</span>
                    </div>
                    <div class="col-12 pl-0 mt-4 ">
                        <span class="titulo-plano">Total</span>
                        <span class="titulo-plano float-right">R$ 838,00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-12">
            <label for="precos">
                <small><b class="text-muted">Forma de Pagamento</b></small>
            </label>
            <select class="form-control" name="" id="precos"> 
                <option>1x de R$ 1037.92 no cartão sem juros</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>
    <div class="row justify-content-md-center mt-5">
        <input class="btn btn-primary btn-lg" type="button" value="Continuar">
    </div>
</div>

@endsection