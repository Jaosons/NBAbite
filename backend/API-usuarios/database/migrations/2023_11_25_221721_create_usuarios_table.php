<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 12);
            $table->string('sobrenome', 30);
            $table->date('nascimento');
            $table->string('cpf', 14);
            $table->string('email', 40);
            $table->string('senha', 30);
            $table->string('genero', 1);
            $table->string('estado', 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
