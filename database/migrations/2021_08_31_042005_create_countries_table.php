<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->string('intro', 200);
            $table->string('flag', 40)->default('default.jpg');
            $table->string('currency', 10)->default('USD');
            $table->boolean('visarequired');
            $table->unsignedInteger('visaduration')->default(0);
            $table->string('lifethere', 300)->nullable();
            $table->string('jobdesc', 400)->nullable();
            $table->boolean('step1')->default(0);
            $table->boolean('step2')->default(0);
            $table->boolean('step3')->default(0);
            $table->boolean('step4')->default(0);
            $table->boolean('step5')->default(0);
            $table->boolean('step6')->default(0);

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
        Schema::dropIfExists('countries');
    }
}