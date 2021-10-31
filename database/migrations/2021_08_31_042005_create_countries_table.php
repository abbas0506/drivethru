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
            $table->string('name', 100);
            $table->string('flag', 50)->default('default.jpg');
            $table->string('intro', 500);
            $table->boolean('edufree');
            $table->string('essential', 200)->nullable();
            $table->string('lifethere', 500)->nullable();
            $table->string('jobdesc', 500)->nullable();
            $table->string('livingcostdesc', 500)->nullable();
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