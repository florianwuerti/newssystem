<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Test Demo',
          'email' => 'test@test.com',
          'password' => bcrypt('123456'),
          'created_at' => '2018-02-09 23:56:49',
          'updated_at' => '2018-02-09 23:56:49',
      ]);
    }
}
