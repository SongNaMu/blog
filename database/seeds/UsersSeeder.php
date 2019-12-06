<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
				for($i = 0; $i < 4; $i++){
  				DB::table('users')->insert([
  						'email' => Str::random(10),
  						'password' => Str::random(4),
  						'name' => Str::random(3)
  				]);
				}

				DB::table('users')->insert([
						'email' => "jubal3863@naver.com",
						'password' => "1234",
						'name' => "Song"
				]);
        DB::table('users')->insert([
						'email' => "tester01",
						'password' => "1234",
						'name' => "tester01"
				]);
        DB::table('users')->insert([
						'email' => "tester02",
						'password' => "1234",
						'name' => "tester02"
				]);
        DB::table('users')->insert([
						'email' => "tester03",
						'password' => "1234",
						'name' => "tester03"
				]);
    }
}
