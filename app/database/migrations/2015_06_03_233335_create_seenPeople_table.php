<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeenPeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('seenPeople', function($table)
        {
            $table->increments('id');
            $table->string('date');
            $table->integer('user_id')->unsigned();
            $table->integer('losts_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('losts_id')->references('id')->on('losts');
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
		//
	}

}
