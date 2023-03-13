<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'username' => 'avavion',
            'email' => 'avavion@mail.ru',
            'password' => Hash::make('adminadmin'),
            'role' => 'admin',
        ]);
        User::query()->create([
            'username' => 'user',
            'email' => 'useruser@mail.ru',
            'password' => Hash::make('useruser'),
            'role' => 'user'
        ]);
        User::query()->create([
            'username' => 'admin',
            'email' => 'adminadmin@mail.ru',
            'password' => Hash::make('adminadmin'),
            'role' => 'admin'
        ]);
    }
}
