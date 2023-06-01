<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElderlyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elderly_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('elderly_id');
            $table->timestamps();

            $table->foreign('elderly_id')->references('id')->on('elderlies')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elderly_records');
    }
}
