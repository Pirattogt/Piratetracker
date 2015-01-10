// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();
		User::create(array(
			'name' => 'Testing Tester',
			'username' => 'test',
			'email' => 'test@badstue.dk',
			'password' => Hash::make('123test'),
		));
	}

}
