<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->string('street');
            $table->string('number');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cep');
            $table->string('flag_type');
            $table->string('data_nascimento');
            $table->string('estado_civil');
            $table->string('cbo');
            $table->string('renda');
            $table->string('titulo_eleitor');

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
        Schema::dropIfExists('clients');
    }
};
