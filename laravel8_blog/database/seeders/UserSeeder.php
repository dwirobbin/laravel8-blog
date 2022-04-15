<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'Lanang',
            'username' => Str::slug('lanang'),
            'email' => 'lanang@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Dwi Robbi',
            'username' => Str::slug('dwi robbi'),
            'email' => 'dwirobbi@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Prasetyo',
            'username' => Str::slug('prasetyo'),
            'email' => 'prasetyo@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
