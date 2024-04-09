<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasakhirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('lecturers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('topik_id')->constrained('topik_tugas_akhirs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('bimbingan_id')->constrained('bimbingans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kelengkapan_id')->constrained('kelengkapan_t_a_s')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('skta_id')->constrained('s_k_t_a_s')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('tat_id')->constrained('t_a_t_s')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugasakhirs');
    }
};
