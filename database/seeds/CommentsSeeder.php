<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_id = ['tester01', 'tester02', 'tester03'];

        for($i = 0; $i < 1000; $i++){
          DB::table('comments')->insert([
              'board_id' => rand(1,60),
              'user_id' => $user_id[rand(0,2)],
              'contents' => Str::random(10)
          ]);
        }
    }
}
