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
            $table->enum("age_group", ["A", "B", "C"]);
            $table->integer("weight");
            $table->boolean("is_new")->default(0);
            $table->boolean("is_mental_emotional")->default(0);
            $table->tinyInteger("weight_category")->default(1)->comment("1 = BB Kurang, 2 = BB Lebih");
            $table->boolean("is_anemia")->default(0);
            $table->boolean("has_diabetes")->default(0);
            $table->boolean("has_kidney_disorder")->default(0);
            $table->boolean("has_kidney")->default(0);
            $table->tinyInteger("screening")->comment("1 = Obati, 2 = Rujuk");

            $table->integer("blood_pressure_res");
            $table->tinyInteger("blood_pressure_group")->default(1)->comment("1 = Normal, 2 = Rendah, 3 = Tinggi");

            $table->integer("imt_res");
            $table->tinyInteger("imt_group")->default(1)->comment("1 = Normal, 2 = Kurang, 3 = Lebih");

            $table->integer("blood_sugar_res");
            $table->tinyInteger("blood_sugar_group")->default(1)->comment("1 = Normal, 2 = DM");

            $table->integer("colestrol_res");
            $table->tinyInteger("colestrol_group")->default(1)->comment("1 = Normal, 2 = Hiperlipiden");

            $table->integer("brathel_indeks_res");
            $table->tinyInteger("brathel_indeks_group")->default(1)->comment("1 = Mandiri, 2 = Ringan, 3 = Sedang, 4 = Berat, 5 = Total");

            $table->tinyInteger("romberg_res")->default(1)->comment("1 = Positif, 2 = Negatif");

            $table->integer("mmse_res")->default(0);
            $table->tinyInteger("mmse_group")->default(1)->comment("1 = Tidak ada, 2 = Ringan, 3 = Berat");
            
            $table->integer("risk_factor_res")->default(0);
            $table->tinyInteger("risk_factor_group")->default(1)->comment("1 = Ada, 2 = Tidak ada");

            $table->integer("depression_res")->default(0);
            $table->tinyInteger("depression_group")->default(1)->comment("1 = Normal, 2 = Ringan, 3 = Sedang, 4 = Berat");


            $table->text("other_disease")->nullable();

            $table->text("note")->default("-");

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
