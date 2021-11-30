<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_nf')->unique();
            $table->double('valor_nf', 10, 2);
            $table->string('numero_cte')->unique();
            $table->double('valor_cte', 10, 2);
            $table->date('data_chegada');
            $table->date('data_entrega')->nullable();
            $table->integer('tipo_pagamento'); /* 0- CIF, 1- FOB */
            $table->unsignedInteger('volume');
            $table->string('obs')->nullable();
            $table->boolean('pode_alterar')->default(true);
            $table->boolean('finalizado')->default(false);

            $table->foreignId('remetente_id');
            $table->foreign('remetente_id')->references('id')->on('clientes')->onDelete('CASCADE');

            $table->foreignId('destinatario_id');
            $table->foreign('destinatario_id')->references('id')->on('clientes')->onDelete('CASCADE');
            
            $table->integer('cidade_remetente_id')->unsigned();
            $table->foreign('cidade_remetente_id')->references('id')->on('cidades')->onDelete('CASCADE');

            $table->integer('cidade_destinataria_id')->unsigned();
            $table->foreign('cidade_destinataria_id')->references('id')->on('cidades')->onDelete('CASCADE');

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');

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
        Schema::dropIfExists('ctes');
    }
}
