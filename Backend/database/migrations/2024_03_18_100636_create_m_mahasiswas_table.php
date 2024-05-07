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
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            // $table->id();

            // untuk field id
            $table->integer('id')->autoIncrement();

            // field npm
            $table->char('npm', 8);

            // field nama
            $table->string('nama', 100);

            // field jurusan
            $table->string('telepon', 15);

            // field jurusan
            $table->enum('jurusan', ['IF', 'SI', 'TI', 'TK', 'SIA']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mahasiswa');
    }
};
