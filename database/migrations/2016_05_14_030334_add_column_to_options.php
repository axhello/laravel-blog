<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->string('twitter')->nullable();
            $table->string('weibo')->nullable();
            $table->string('steam')->nullable();
            $table->string('github')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->string('twitter')->nullable();
            $table->string('weibo')->nullable();
            $table->string('steam')->nullable();
            $table->string('github')->nullable();
            $table->string('email')->nullable();
        });
    }
}
