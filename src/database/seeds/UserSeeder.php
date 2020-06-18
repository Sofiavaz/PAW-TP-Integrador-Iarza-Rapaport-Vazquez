<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\User();
        $user->name = "Joey";
        $user->email = "joey@example.com";
        $user->password = \Illuminate\Support\Facades\Hash::make('12345678');
        $user->save();
    }
}
