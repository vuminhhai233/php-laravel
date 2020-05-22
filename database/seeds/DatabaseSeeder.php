<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' =>'vũ minh hải',
            'email' => 'admin@gmail.com',
            'phone' => '123456789',
            'address'=>'123456',
            'level'=>1,
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' =>'vũ minh hải',
            'email' => 'hai@gmail.com',
            'phone' => '123456789',
            'address'=>'123456',
           'password' => bcrypt('123456'),
        ]);

    }
}
