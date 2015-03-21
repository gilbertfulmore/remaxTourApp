<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTestAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::table('agents')->insert(
            array(
                'id' => 1,
                'email' => 'logan@example.com',
                'f_name' => 'Logan',
                'l_name' => 'Small',
                'auth_level' => 'admin',
                'password' => Hash::make('dangerzone')
            )
        );

        DB::table('agents')->insert(
            array(
                'id' => 2,
                'email' => 'jd@example.com',
                'f_name' => 'John',
                'l_name' => 'Doe',
                'auth_level' => 'agent',
                'password' => Hash::make('password')
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
