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
        Schema::create('book_cont_msk', function (Blueprint $table) {
            $table->id();
            $table->string('no_container');
            $table->date('tgl_book_msk');
            $table->string('customer');
            $table->string('consigne');
            $table->string('vessel');
            $table->string('voyage');
            $table->string('asal');
            $table->integer('ukuran');
            $table->string('type');
            $table->date('date')->useCurrent();
            $table->enum('status', ['booked', 'archive'])->default('booked');
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
        Schema::dropIfExists('book_cont_msk');
    }
};
