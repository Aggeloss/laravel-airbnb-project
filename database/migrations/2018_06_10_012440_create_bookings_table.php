<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('accommondation_id')->unsigned();
  	        $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('accommondation_id')->references('id')->on('accommondations');

            $table->integer('no_adult');
            $table->integer('no_child');
            $table->integer('no_baby');
            $table->date('from');
            $table->date('to');
            $table->boolean('checkin');
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
        Schema::dropIfExists('bookings');
    }
}
