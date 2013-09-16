<?php

class LaravellaDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
//		Eloquent::unguard();

		$this->call('ApplicationSeeder');
                
	}

}