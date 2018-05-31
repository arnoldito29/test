<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'name'       => 'admin',
            'email'      => 'admin@admin.com',
            'admin'      => '1',
            'password'   => bcrypt('password'),
            'created_at' => Carbon::parse('2018-05-29'),
            'updated_at' => Carbon::parse('2018-05-29'),
        ]);
    }
}
