<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Planos;
use \App\Clientes;
use \App\DadosPagamentos as DadosCartao; 

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
        if(!empty($plano)){
            return view('pagamento.cliente', $dadosView);    
        }
        else{
            return redirect('/pagamento/planos');
        }
    }

    public function salvarCliente(Request $request){
        
        $validacao = $request->validate([
            'nome' =>  'required|max:100|min:5',
            'cpf' => 'required|max:15',
            'dataNascimento' => 'required',
            'telefone' => 'required|max:15'
        ]); 
        
        $data = explode('/',$request->dataNascimento);
        $dataNascimento = "$data[2]-$data[1]-$data[0]";

        $clienteExiste = Clientes::where('cpf',$request->cpf)->get();
        if(!empty($clienteExiste->count('cpf')) && $clienteExiste->count('cpf') == 1){

            $dadosPlano = (object)['nome' => $request->input('planoNome'),'valorParcelas' => $request->input('valorParcelas')];

            $cliente = Clientes::find($clienteExiste['0']->id);
            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->dataNascimento = $dataNascimento;
            $cliente->telefone = $request->telefone;
            $cliente->save();

            $dadosView = [
                'clienteId' => $clienteExiste['0']->id,
                'plano' => $dadosPlano
            ];

            return view('pagamento.cartao', $dadosView);

        }else{
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
        
    }


    public function salvarCartao(Request $request){
        
        $cartaoExiste = DadosCartao::where('numeroCartao',str_replace(' ','', $request->numeroCartao))->get();
        //dd($cartaoExiste);
        if (!empty($cartaoExiste->count('numeroCartao')) && $cartaoExiste->count('numeroCartao') == 1){
            
            $cartao = DadosCartao::find($cartaoExiste['0']->id);
            $cartao->numeroCartao = str_replace(' ','', $request->numeroCartao);
            $cartao->nomeTitular = trim($request->nomeTitular);
            $cartao->validade = trim($request->validadeCartao);
            $cartao->codSeguranca = trim($request->codigoSeguranca);
            $cartao->cliente_id = trim($request->clienteId);
            $cartao->save();

            return view('pagamento.sucesso');
        }
        else{
            $cartao = new DadosCartao;
            $cartao->numeroCartao = str_replace(' ','', $request->numeroCartao);
            $cartao->nomeTitular = trim($request->nomeTitular);
            $cartao->validade = trim($request->validadeCartao);
            $cartao->codSeguranca = trim($request->codigoSeguranca);
            $cartao->cliente_id = trim($request->clienteId);
            $cartao->save();

            return view('pagamento.sucesso');
        }

    }

}
