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
            'name'=> 'Huỳnh Vinh Phát',
            'email'=>'1234567@gmail.com',
            'phone'=>rand(1000000000,9999999999),
            'is_admin'=>1,
            'password'=>bcrypt('123456'),

        ]);
    }
}
