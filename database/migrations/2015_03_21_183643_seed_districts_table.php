<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDistrictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::table('districts')->insert(
            array(
                'name' => 'Beaverdell-Carmi',
                'code' => 'BE'
            )
        );

        DB::table('districts')->insert(
            array(
                'name' => 'Black Mountain',
                'code' => 'BL'
            )
        );

        DB::table('districts')->insert(
            array(
                'name' => 'Big White',
                'code' => 'BW'
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
