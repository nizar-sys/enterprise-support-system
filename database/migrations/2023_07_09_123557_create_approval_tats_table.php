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
        Schema::create('approval_tats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tat_id')->constrained('t_a_t_s')->cascadeOnUpdate()->cascadeOnDelete();
            $table->year('tahun_lulus');
            $table->string('email');
            $table->string('telepon');
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
        Schema::dropIfExists('approval_tats');
    }
};
