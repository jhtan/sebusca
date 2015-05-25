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
        Schema::drop('missings');
        Schema::drop('users2');
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
