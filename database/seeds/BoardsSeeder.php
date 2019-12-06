<?php

use Illuminate\Database\Seeder;

class BoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0; $i < 20; $i++){
          DB::table('boards')->insert([
            'title' => Str::random(10),
            'user_id' => 'tester01',
            'content' => Str::random(100)
          ]);
          DB::table('boards')->insert([
            'title' => Str::random(10),
            'user_id' => 'tester02',
            'content' => Str::random(100)
          ]);
          DB::table('boards')->insert([
            'title' => Str::random(10),
            'user_id' => 'tester02',
            'content' => Str::random(100)
          ]);
        }
    }
}
