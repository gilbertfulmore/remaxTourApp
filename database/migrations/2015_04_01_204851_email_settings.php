<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmailSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('email_settings', function(Blueprint $table)
        {
            $table->string('used_for', 20)->primary();
            $table->string('template', 20);
            $table->boolean('enabled');

            $table->foreign('template')->references('name')->on('email_templates');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_settings');
	}

}
