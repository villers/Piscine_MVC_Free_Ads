<?php

class UsersTableSeeder extends DatabaseSeeder {

	public function run()
	{
		$now = date('Y-m-d H:i:s');
		$users = [
			[
				'username'	 => 'admin',
				'password'	 => Hash::make('admin'),
				'email'		 => 'admin@admin.fr',
				'confirmed'		 => '1',
				'created_at' => $now,
				'updated_at' => $now
			],
		];
		DB::table('users')->insert($users);
	}

}
