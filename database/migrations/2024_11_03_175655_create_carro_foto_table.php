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
        Schema::create('carro_foto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('legenda')->nullable();
            $table->string('img', 45)->nullable();
            $table->char('destaque', 1)->default('N');
            $table->integer('ordem')->default(99);
            $table->unsignedInteger('carro_id')->index('fk_carro_foto_carro1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carro_foto');
    }
};
