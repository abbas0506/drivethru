<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id');
            $table->unsignedInteger('year');
            $table->unsignedBigInteger('board_id');
            $table->string('institution', 100);
            $table->unsignedInteger('rollno');
            $table->unsignedInteger('regno');
            $table->unsignedInteger('obtained');
            $table->unsignedInteger('total');

            $table->foreign('level_id')
                ->references('id')
                ->on('levels')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('board_id')
                ->references('id')
                ->on('boards')
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
        Schema::dropIfExists('academics');
    }
}