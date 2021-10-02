<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnicoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unicourses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedInteger('duration');
            $table->unsignedInteger('fee');
            $table->string('criteria');
            $table->string('requirement');
            $table->date('closing')->nullable();
            $table->unsignedInteger('lastmerit')->nullable();
            //make composite key
            $table->unique(['university_id', 'course_id']);
            $table->timestamps();

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
        Schema::dropIfExists('unicourses');
    }
}