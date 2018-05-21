<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginAttemptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login_attempts', function(Blueprint $table)
		{
			$table->string('ip', 45)->primary();
			$table->timestamp('first_attempt')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->smallInteger('tries');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login_attempts');
	}

}
