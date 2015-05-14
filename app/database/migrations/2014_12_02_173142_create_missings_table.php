<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('missings', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('name');
      $table->string('last_name');
      $table->string('document_number');
      $table->integer('date_of_birth');
      $table->string('clothing');
      $table->string('nationality');
      $table->string('description');
      $table->string('latitude');
      $table->string('longitude');
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
		Schema::table('missings', function(Blueprint $table)
		{
      Schema::drop('users');
		});
	}

}