<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'    => 'Azamat Tulebaev',
            'email'    => 'aza@mail.ru',
            'password'   =>  'Aao3622',
            'remember_token' =>  str_random(10),
        ]);

    }
}
