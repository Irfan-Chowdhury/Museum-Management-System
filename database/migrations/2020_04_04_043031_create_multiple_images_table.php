<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //-- This file will be updated later --

    public function up() 
    {
        Schema::create('multiple_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); //Admin
            // $table->unsignedBigInteger('museum_id');
            $table->string('photo');
            $table->string('type');
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
        Schema::dropIfExists('multiple_images');
    }
}
