<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Alex Gomez';
        $user->email = 'alexgoga120@gmail.com';
        $user->password = Hash::make('prueba');
        $user->saveOrFail();

        $user = new User();
        $user->name = 'Uriel';
        $user->email = 'paisa@gmail.com';
        $user->password = Hash::make('prueba');
        $user->saveOrFail();
    }
}
