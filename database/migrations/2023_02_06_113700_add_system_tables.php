<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSystemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', static function(Blueprint $table) {
            $table->increments('id');
            $table->string('body')->nullable();
            $table->integer('http_code');
            $table->string('method');
            $table->integer('route_id')->index();
        });

        Schema::create('route', static function(Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('route')->index();
        });

        Schema::create('response', static function(Blueprint $table) {
           $table->increments('id');
           $table->string('body')->nullable();
           $table->string('request_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
