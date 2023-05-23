<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInterestTable extends Migration
{
    public function up()
    {
        Schema::create('user_interest', function (Blueprint $table) {
            $table->unsignedBigInteger('interest_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['interest_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_interest');
    }
}
