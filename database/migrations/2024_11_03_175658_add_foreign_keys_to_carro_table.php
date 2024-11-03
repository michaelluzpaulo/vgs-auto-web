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
        Schema::table('carro', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'fk_carro_categoria1')->references(['id'])->on('categoria')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carro', function (Blueprint $table) {
            $table->dropForeign('fk_carro_categoria1');
        });
    }
};
