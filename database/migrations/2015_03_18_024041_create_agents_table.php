<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agents', function(Blueprint $table)
		{
			$table->integer('id')->primary();
            $table->string('email')->unique();
			$table->string('f_name', 20);
            $table->string('l_name', 20);
            $table->string('auth_level', 10);
            $table->string('password', 60);
            $table->timestamps();
            $table->rememberToken();

            $table->foreign('auth_level')->references('name')->on('auth_levels');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agents');
	}

}