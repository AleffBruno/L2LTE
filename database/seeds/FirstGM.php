<?php

use Illuminate\Database\Seeder;
use App\User;

class FirstGM extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'a@a.com',
            'password' => User::hashPassword('123456'),
            'name' => 'a',
            'credits' => '0',
            'lang_fk' => 'en-GB'
        ]);

        DB::table('accounts')->insert([
            'user_fk' => '1',
            'login' => 'acc1',
            'access_level' => '1',
            'password' => User::hashPassword('123456')
        ]);
    }
}
