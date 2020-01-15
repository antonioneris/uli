<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',200);
            $table->decimal('valorAdesao',7,2)->nullable();
            $table->integer('descontoAdesao')->nullable();;
            $table->decimal('valorMensalidade',7,2)->nullable();
            $table->integer('descontoMensalidade')->nullable();
            $table->decimal('valorAnuidade',7,2)->nullable();
            $table->integer('descontoAnuidade')->nullable();
            $table->decimal('valorTotal',7,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planos');
    }
}
