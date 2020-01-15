<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Planos;
use \App\Clientes;

class PagamentosController extends Controller
{
    public function index() {
        return redirect('/pagamento/planos');
    }

    public function plano() {
        
        return view('pagamento.plano');
    }

    public function cliente(Request $request) {
        $plano = Planos::where('id',$request->input('planoId'))->first();
        $valorParcelas = str_replace('de','', $request->input('valorParcelas'));

       $dadosView = [
           'plano' => $plano,
           'valorParcelas' => $valorParcelas
       ];
        return view('pagamento.cliente', $dadosView);
    }

    public function salvarCliente(Request $request){
            //salvar no banco e direcionar nova tela
        
        $validacao = $request->validate([
            'nome' =>  'required|max:100|min:5',
            'cpf' => 'required|max:15',
            'dataNascimento' => 'required',
            'telefone' => 'required|max:15'
        ]); 
        
        $data = explode('/',$request->dataNascimento);
        $dataNascimento = "$data[2]-$data[1]-$data[0]";
        $cliente = new Clientes;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->dataNascimento = $dataNascimento;
        $cliente->telefone = $request->telefone;
        $cliente->save();
        
        $dadosPlano = (object)['nome' => $request->input('planoNome'),'valorParcelas' => $request->input('valorParcelas')];

        $dadosView = [
            'clienteId' => $cliente->id,
            'plano' => $dadosPlano
        ];



        return view('pagamento.cartao', $dadosView);

    }

    public function dadosCartao() {
        return view('pagamento.cartao');
    }

    public function salvarCartao(Request $request){
        //salvar dados do cartao vinculado ao cliente
        //salvar na  tabela de vendas os dados da assinatura
    }

}
