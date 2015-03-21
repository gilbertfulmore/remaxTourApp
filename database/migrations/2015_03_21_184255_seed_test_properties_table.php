<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTestPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('properties')->insert(
            array(
                'id' => 1010,
                'address' => '860 KLO road V1Y 9K9',
                'sq_feet' => 40000,
                'district_code' => 'BW'
            )
        );

        DB::table('properties')->insert(
            array(
                'id' => 2020,
                'address' => '200 Gordon',
                'sq_feet' => 65000,
                'district_code' => 'BE'
            )
        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
