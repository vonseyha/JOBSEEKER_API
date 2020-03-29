<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCvModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_cv_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('Fullname');
            $table->String('Email')->unique;
            $table->String('Address');
            $table->String('Interest');
            $table->String('Experience');
            $table->String('Language');
            $table->String('Lastdate');
            $table->String('Demo_File');
            $table->String('Icon');
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
        Schema::dropIfExists('post_cv_models');
    }
}
