<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
			$table->integer('user_fk')->unsigned()->index();
			$table->string('login', 45)->default('')->primary();
			$table->string('password', 45)->nullable();
			$table->decimal('lastactive', 20, 0)->nullable();
			$table->integer('access_level')->nullable()->default(0);
			$table->string('lastIP', 20)->nullable();
			$table->integer('lastServer')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
