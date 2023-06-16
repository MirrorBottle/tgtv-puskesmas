<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElderliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elderlies', function (Blueprint $table) {
            $table->id();
            $table->string("nik")->unique();
            $table->string("name");
            $table->date("birth_date");
            $table->enum("gender", ["L", "P"]);
            $table->text("address")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("last_education")->nullable();

            $table->boolean("is_deceased")->default(0);
            $table->text("cause_of_death")->nullable();
            $table->date("deceased_at")->nullable();
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
        Schema::dropIfExists('elderlies');
    }
}
