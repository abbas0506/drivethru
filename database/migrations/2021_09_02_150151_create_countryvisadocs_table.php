<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryvisadocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countryvisadocs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_id');
            $table->unsignedBigInteger('country_id');

            $table->foreign('doc_id')
                ->references('id')
                ->on('documents')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
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
        Schema::dropIfExists('countryvisadocs');
    }
}