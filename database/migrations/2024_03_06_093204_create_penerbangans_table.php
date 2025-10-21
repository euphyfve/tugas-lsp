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
        Schema::create('penerbangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->nullable();
            $table->foreignId('id_bandara')->constrained('bandaras');
            $table->text('tujuan_akhir')->nullable();
            $table->integer('seat')->unsigned()->nullable();
            $table->text('berangkat')->nullable();
            $table->text('foto')->nullable();
            $table->integer('harga')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbangans');
    }
};
