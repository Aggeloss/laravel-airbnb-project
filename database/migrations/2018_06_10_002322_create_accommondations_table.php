<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccommondationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommondations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
  	        $table->foreign('user_id')->references('id')->on('users');

            $table->string('title');
            $table->text('pic');
            $table->string('city');
            $table->text('description');
            $table->string('action');
            $table->integer('rate');
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
        Schema::dropIfExists('accommondations');
    }
}
