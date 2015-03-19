<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estimates', function(Blueprint $table)
		{
			$table->integer('agent_id');
			$table->string('mls', 8);
            $table->integer('price');
            $table->timestamps();                   // Adds a created_at and updated_at columns

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('mls')->references('mls')->on('listings');


		});
        DB::unprepared('ALTER TABLE `estimates` ADD PRIMARY KEY ( `agent_id`, `mls`)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estimates');
	}

}
