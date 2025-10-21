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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->foreignId('id_bandara')->constrained('bandaras')->nullable();
            // bandara = tujuan awal ygy
            $table->string('nama_user')->nullable();
            $table->string('seat')->nullable();
            $table->string('class')->nullable();
            $table->string('keberangkatan')->nullable();
            $table->string('tujuan_akhir')->nullable();
            $table->text('total')->nullable();
            $table->enum('conf', ['Process', 'Done'])->default('process')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
