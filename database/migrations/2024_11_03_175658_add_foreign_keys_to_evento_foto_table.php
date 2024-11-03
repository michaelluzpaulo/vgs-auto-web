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
        Schema::table('evento_foto', function (Blueprint $table) {
            $table->foreign(['evento_id'], 'fk_evento_foto_evento1')->references(['id'])->on('evento')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evento_foto', function (Blueprint $table) {
            $table->dropForeign('fk_evento_foto_evento1');
        });
    }
};
