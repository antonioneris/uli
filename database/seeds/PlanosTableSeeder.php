<?php

use Illuminate\Database\Seeder;

class PlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Plano Mensal
        $plano = new \App\Planos();
        $plano->nome = 'Plano Mensal';
        $plano->valorAdesao = '499.00';
        $plano->descontoAdesao = '0';
        $plano->valorMensalidade = '49.90';
        $plano->descontoMensalidade = '0';
        $plano->save();

        //Plano Anual
        $plano = new \App\Planos();
        $plano->nome = 'Plano Anual';
        $plano->valorAdesao = ' 299.40';
        $plano->descontoAdesao = '40';
        $plano->valorAnuidade = '538.92';
        $plano->descontoAnuidade = '10';
        $plano->valorTotal = '838.32';
        $plano->save();
        
    }
}
