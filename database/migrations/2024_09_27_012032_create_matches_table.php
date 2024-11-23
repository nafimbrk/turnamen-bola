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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turnamen_id')->constrained('turnamen')->onDelete('cascade');
            $table->foreignId('tim_a_id')->constrained('tim')->onDelete('cascade');
            $table->foreignId('tim_b_id')->constrained('tim')->onDelete('cascade');
            $table->foreignId('pemenang_id')->nullable()->constrained('tim')->onDelete('set null');
            $table->string('jenis');
            $table->integer('waktu');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
