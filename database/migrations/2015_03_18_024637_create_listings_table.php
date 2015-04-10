<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings', function(Blueprint $table)
		{
			$table->string('mls', 8)->primary();
			$table->integer('agent_id');
            $table->timestamp('created_on');
            $table->unsignedInteger('tour_id');
            $table->integer('property_id');
            $table->string('status', 1);
            $table->integer('rank');

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('tour_id')->references('id')->on('tours');
            $table->foreign('property_id')->references('id')->on('properties');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('listings');
	}

}
