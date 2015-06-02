<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropingNotUsedTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::drop('lost');
	}

    /**
	 * Reverse the migrations.
	 *
     * @return void
	 */
	public function down()
	{

	}

}
