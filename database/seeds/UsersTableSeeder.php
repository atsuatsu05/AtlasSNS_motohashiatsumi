<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['username' => '日向', 'mail' => 'hinata@gmail.com', 'password' => bcrypt('hinata12'), 'bio' => '飛びます！'],
            ['username' => '影山', 'mail' => 'kageyama@gmail.com', 'password' => bcrypt('kageyama34'), 'bio' => '上げます！'],
            ['username' => '澤村', 'mail' => 'sawamura@gmail.com', 'password' => bcrypt('sawamura56'), 'bio' => '支えます！'],
            ['username' => '田中', 'mail' => 'tanaka@gmail.com', 'password' => bcrypt('tanaka78'), 'bio' => '盛り上げます！'],
            ['username' => '月島', 'mail' => 'tsukishima@gmail.com', 'password' => bcrypt('tsukishima90'), 'bio' => '止めます。'],
        ]);
    }
}
