<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('name', 100);
            $table->string('fname', 100);
            $table->string('mname', 100);
            $table->string('cnic', 20)->unique();
            $table->string('passport', 100)->unique();
            $table->string('address', 150);
            $table->boolean('gender');
            $table->string('religion', 50);
            $table->string('bloodgroup', 3);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('pic', 100);

            $table->boolean('step1')->default(0);
            $table->boolean('step2')->default(0);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('profiles');
    }
}