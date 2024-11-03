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
        Schema::table('carro_foto', function (Blueprint $table) {
            $table->foreign(['carro_id'], 'fk_carro_foto_carro1')->references(['id'])->on('carro')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carro_foto', function (Blueprint $table) {
            $table->dropForeign('fk_carro_foto_carro1');
        });
    }
};
