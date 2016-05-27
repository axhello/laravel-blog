<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author')->nullable();
            $table->string('title')->nullable();
            $table->string('siteUrl')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('twitter')->nullable();
            $table->string('weibo')->nullable();
            $table->string('steam')->nullable();
            $table->string('github')->nullable();
            $table->string('email')->nullable();
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
        Schema::drop('options');
    }
}
