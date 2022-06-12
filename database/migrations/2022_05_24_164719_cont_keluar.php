<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('cont_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_book_keluar')->constrained('book_cont_keluar');
            $table->foreignId('id_petugas')->constrained('petugas_survey');
            $table->date('tgl_keluar');
            $table->string('angkutan');
            $table->string('driver');
            $table->string('nopol');
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('stage', ['created', 'archive'])->default('created');
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
        Schema::dropIfExists('cont_keluar');
    }
};
