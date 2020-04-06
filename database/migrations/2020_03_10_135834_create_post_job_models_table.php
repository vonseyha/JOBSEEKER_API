<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostJobModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_job_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('CompanyName');
            $table->String('Term');
            $table->String('Title');
            $table->String('Requirement');
            $table->String('Experience');
            $table->String('Email')->unique;
            $table->String('Address');
            $table->String('Lastdate');
            $table->String('Phone');
            $table->String('Icon')->nullable();
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
        Schema::dropIfExists('post_job_models');
    }
}
