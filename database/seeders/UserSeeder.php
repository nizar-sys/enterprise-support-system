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
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'pembina',
                'username' => 'pembina',
                'email' => 'pembina@mail.com',
                'password' => Hash::make('password'),
                'role' => 'pembina',
            ],
            [
                'name' => 'dosen',
                'username' => 'dosen',
                'email' => 'dosen@mail.com',
                'password' => Hash::make('password'),
                'role' => 'dosen',
            ],
            [
                'name' => 'mahasiswa',
                'username' => 'mahasiswa',
                'email' => 'mahasiswa@mail.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
            ],
        ];

        User::insert($users);
    }
}
