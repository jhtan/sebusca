<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddingColumsToLosts2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('losts',function (Blueprint $table){
            $table->integer('city_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('city');
            $table->foreign('country_id')->references('id')->on('country');

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
