<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_table__users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('username');
            $table->String('email')->unique;
            $table->String('password');
            $table->String('address');
            $table->String('gender');
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
        Schema::dropIfExists('_table__users');
    }
}
