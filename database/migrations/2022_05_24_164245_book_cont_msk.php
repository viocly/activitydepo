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
        Schema::create('book_cont_msk', function (Blueprint $table) {
            $table->id();
            $table->string('no_container', 11);
            $table->date('tgl_book_msk');
            $table->string('customer', 50);
            $table->string('consigne', 50);
            $table->string('vessel', 50);
            $table->string('voyage', 10);
            $table->string('asal', 50);
            $table->integer('ukuran');
            $table->string('type', 20);
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status', 10);
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
        Schema::dropIfExists('book_cont_msk');
    }
};
