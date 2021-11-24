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
            $table->boolean('pode_alterar');
            $table->unsignedFloat('valor_cte');
            $table->unsignedInteger('volume');
            $table->string('obs')->nullable();
            $table->date('data_chegada');
            $table->string('numero_cte')->unique();
            $table->boolean('finalizado');
            $table->date('data_entrega')->nullable();
            $table->integer('tipo_pagamento');
            $table->unsignedFloat('valor_nf');

            $table->foreignId('remetente_id');
            $table->foreign('remetente_id')->references('id')->on('clientes')->onDelete('CASCADE');

            $table->foreignId('destinatario_id');
            $table->foreign('destinatario_id')->references('id')->on('clientes')->onDelete('CASCADE');

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
