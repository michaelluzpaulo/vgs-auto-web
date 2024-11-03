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
        Schema::create('carro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 70);
            $table->text('texto');
            $table->string('ref_amigavel', 150)->nullable()->unique('ref_amigavel_unique');
            $table->char('ativo', 1)->default('S');
            $table->char('vendido', 1)->default('N');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->unsignedInteger('categoria_id')->index('fk_carro_categoria1_idx');
            $table->string('valor', 100);
            $table->string('img', 45)->nullable();
            $table->string('cor', 40)->nullable();
            $table->string('ano', 40)->nullable();
            $table->string('combustivel', 40)->nullable();
            $table->string('motorizacao', 40)->nullable();
            $table->string('cambio', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carro');
    }
};
