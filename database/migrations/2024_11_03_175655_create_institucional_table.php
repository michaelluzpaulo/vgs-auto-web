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
        Schema::create('institucional', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 70);
            $table->text('texto');
            $table->string('ref_amigavel', 150)->nullable()->unique('ref_amigavel_unique');
            $table->string('agrupador', 70)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institucional');
    }
};
