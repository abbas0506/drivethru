<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedInteger('maxhrs');
            $table->unsignedInteger('hourlyrate');
            $table->unsignedBigInteger('jobdeptt_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('country_id');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('level_id')
                ->references('id')
                ->on('levels')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('country_jobs');
    }
}