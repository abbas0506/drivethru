<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_queries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('phone', 20);
            $table->string('email', 50);
            $table->string('subject', 50);
            $table->string('message', 200); //notification text
            $table->boolean('status')->default(0);  //read or not read
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
        Schema::dropIfExists('guest_queries');
    }
}