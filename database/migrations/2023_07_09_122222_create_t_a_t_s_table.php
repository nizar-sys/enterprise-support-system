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
        Schema::create('t_a_t_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nim');
            $table->string('surat_keterangan_lulus');
            $table->string('tugas_akhir');
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
        Schema::dropIfExists('t_a_t_s');
    }
};
