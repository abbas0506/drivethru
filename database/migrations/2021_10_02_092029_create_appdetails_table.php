<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('course_id');
            $table->unique(['application_id', 'university_id', 'course_id']);
            $table->timestamps();

            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('university_id')
                ->references('id')
                ->on('universities')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appdetails');
    }
}