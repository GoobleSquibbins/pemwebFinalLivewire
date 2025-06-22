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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id('jadwal_id');

            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')->references('film_id')->on('films')->onDelete('cascade');

            $table->unsignedBigInteger('studio_id');
            $table->foreign('studio_id')->references('studio_id')->on('studios')->onDelete('cascade');
            
            $table->date('tanggal');
            $table->time('jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
