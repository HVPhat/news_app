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
            'name'=> Str::random(10),
            'email'=>Str::random(10).'@gmail.com',
            'phone'=>rand(1000000000,9999999999),
            'is_admin'=>rand(0,1),
            'password'=>bcrypt('password'),

        ]);
    }
}
