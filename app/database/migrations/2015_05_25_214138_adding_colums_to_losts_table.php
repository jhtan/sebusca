<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingColumsToLostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('losts',function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('missing_since');
            $table->string('missing_place');
            $table->string('height');
            $table->string('weight');
            $table->string('mannerisms');
            $table->string('jewerly');
            $table->string('sex');
            $table->string('race');
            $table->string('hair');
            $table->string('eyes');
            $table->string('identifying_marks');
            $table->string('contact_number');
            $table->foreign('user_id')->references('id')->on('users');

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






