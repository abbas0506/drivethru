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
            $table->boolean('visarequired');
            $table->unsignedInteger('visaduration');
            $table->unsignedInteger('livingcost');
            $table->string('lifethere', 200);
            $table->string('jobdesc', 400)->nullable();
            $table->string('flag', 40)->default('default.jpg');
            $table->boolean('step1')->default(0);
            $table->boolean('step2')->default(0);
            $table->boolean('step3')->default(0);
            $table->boolean('step4')->default(0);

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