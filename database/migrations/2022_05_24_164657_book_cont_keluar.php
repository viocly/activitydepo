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
        Schema::create('book_cont_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cont_msk')->constrained('cont_msk');
            $table->date('tgl_book_keluar');
            $table->string('customer');
            $table->string('shiper');
            $table->string('vessel');
            $table->string('voyage');
            $table->string('tujuan');
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('stage', ['booked', 'archive'])->default('booked');
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
        Schema::dropIfExists('book_cont_keluar');
    }
};
