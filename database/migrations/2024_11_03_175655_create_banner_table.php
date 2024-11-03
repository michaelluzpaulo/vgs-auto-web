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
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 70);
            $table->string('url', 100)->nullable();
            $table->string('img', 45)->nullable();
            $table->integer('ordem')->nullable();
            $table->char('ativo', 1)->default('S');
            $table->string('target', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
