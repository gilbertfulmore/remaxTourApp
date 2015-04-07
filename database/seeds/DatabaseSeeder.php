<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        /////////////////////////////////// DISTRICTS
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

        /////////////////////////////////// AUTH LEVELS
        DB::table('auth_levels')->insert(
            array(
                'name' => 'admin'
            )
        );
        DB::table('auth_levels')->insert(
            array(
                'name' => 'agent'
            )
        );

        DB::table('tours')->insert(
            array(
                'id' => NULL,
                'tour_date' => Carbon::now()
            )
        );
        DB::table('tours')->insert(
            array(
                'id' => NULL,
                'tour_date' => Carbon::now()
            )
        );

        /////////////////////////////////// AGENTS
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

        /////////////////////////////////// PROPERTIES
        DB::table('properties')->insert(
            array(
                'id' => 1010,
                'address' => '860 KLO',
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
        DB::table('properties')->insert(
            array(
                'id' => 3030,
                'address' => '493 Mission',
                'sq_feet' => 30500,
                'district_code' => 'BW'
            )
        );
        DB::table('properties')->insert(
            array(
                'id' => 4040,
                'address' => '2000 Sutherland',
                'sq_feet' => 65000,
                'district_code' => 'BL'
            )
        );

        /////////////////////////////////// LISTINGS
        DB::table('listings')->insert(
            array(
                'mls' => 'F8K2J29S',
                'agent_id' => 1,
                'created_on' => Carbon::now(),
                'tour_id' => 1,
                'property_id' => 1010,
                'status' => 'S'
            )
        );
        DB::table('listings')->insert(
            array(
                'mls' => 'AA1K3J4N',
                'agent_id' => 1,
                'created_on' => Carbon::now(),
                'tour_id' => 1,
                'property_id' => 4040,
                'status' => 'S'
            )
        );
        DB::table('listings')->insert(
            array(
                'mls' => '9DJ3N4M2',
                'agent_id' => 2,
                'created_on' => Carbon::now(),
                'tour_id' => 1,
                'property_id' => 2020,
                'status' => 'S'
            )
        );
        DB::table('listings')->insert(
            array(
                'mls' => 'D8WK3L2K',
                'agent_id' => 1,
                'created_on' => Carbon::now(),
                'tour_id' => 2,
                'property_id' => 3030,
                'status' => 'c'
            )
        );

        /////////////////////////////////// Estimates
        DB::table('estimates')->insert(
            array(
                'mls' => 'D8WK3L2K',
                'agent_id' => 1,
                'created_at' => Carbon::now(),
                'price' => 120000
            )
        );
        DB::table('estimates')->insert(
            array(
                'mls' => 'D8WK3L2K',
                'agent_id' => 2,
                'created_at' => Carbon::now(),
                'price' => 122500
            )
        );
        DB::table('estimates')->insert(
            array(
                'mls' => 'F8K2J29S',
                'agent_id' => 1,
                'created_at' => Carbon::now(),
                'price' => 150000
            )
        );
        DB::table('estimates')->insert(
            array(
                'mls' => 'F8K2J29S',
                'agent_id' => 2,
                'created_at' => Carbon::now(),
                'price' => 140000
            )
        );
        DB::table('estimates')->insert(
            array(
                'mls' => '9DJ3N4M2',
                'agent_id' => 1,
                'created_at' => Carbon::now(),
                'price' => 135000
            )
        );
        DB::table('estimates')->insert(
            array(
                'mls' => '9DJ3N4M2',
                'agent_id' => 2,
                'created_at' => Carbon::now(),
                'price' => 160000
            )
        );
        DB::table('estimates')->insert(
            array(
                'mls' => 'AA1K3J4N',
                'agent_id' => 1,
                'created_at' => Carbon::now(),
                'price' => 250000
            )
        );
        DB::table('estimates')->insert(
            array(
                'mls' => 'AA1K3J4N',
                'agent_id' => 2,
                'created_at' => Carbon::now(),
                'price' => 275000
            )
        );

        /////////////////////////////////// Emails
        DB::table('email_templates')->insert(
            array(
                'name' => 'default',
                'subject' => 'RealSoft Automatic Email',
                'body' => 'This is the body inside the Weekly Tour automated email'
            )
        );

        DB::table('email_settings')->insert(
            array(
                'used_for' => 'weeklyTour',
                'template' => 'default',
                'enabled' => True
            )
        );
	}

}
