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
        Schema::table('institucional_foto', function (Blueprint $table) {
            $table->foreign(['institucional_id'], 'fk_institucional_foto_institucional1')->references(['id'])->on('institucional')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institucional_foto', function (Blueprint $table) {
            $table->dropForeign('fk_institucional_foto_institucional1');
        });
    }
};
