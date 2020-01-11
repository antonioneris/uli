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

        //Plano Anual
        $plano = new \App\Planos();
        $plano->nome = 'Plano Anual';
        $plano->valorAdesao = '499.00';
        $plano->descontoAdesao = '40';
        $plano->valorMensalidade = '49.90';
        $plano->descontoMensalidade = '10';
        
    }
}
