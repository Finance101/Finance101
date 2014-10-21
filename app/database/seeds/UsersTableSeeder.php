<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = new User();
		$user->first_name = 'Mohammad';
		$user->last_name = 'Wong';
		$user->email = 'mohwong@dprc.cn';
		$user->password = Hash::make('123');
		$user->save();
	}

}