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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->integer('Nim')->primary();
            $table->string('Nama', 75)->nullable();
            // $table->string('Tanggal_Lahir', 20)->nullable();
            $table->string('Kelas', 15)->nullable();
            $table->string('Jurusan', 50)->nullable();
            // $table->string('Email', 20)->nullable();
            $table->string('No_Handphone', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas', function (Blueprint $table) {
            $table->integer('Nim')->primary();
            $table->string('Nama', 75)->nullable();
            // $table->string('Tanggal_Lahir', 20)->nullable();
            $table->string('Kelas', 15)->nullable();
            $table->string('Jurusan', 50)->nullable();
            // $table->string('Email', 20)->nullable();
            $table->string('No_Handphone', 20)->nullable();
        });
    }
};