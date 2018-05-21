<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGameserversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gameservers', function(Blueprint $table)
		{
			$table->integer('server_id')->default(0)->primary();
			$table->string('hexid', 50)->default('');
			$table->string('host', 50)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gameservers');
	}

}
