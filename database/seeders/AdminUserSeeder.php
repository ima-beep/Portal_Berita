<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mail.com'], // cari berdasarkan email
            [
                'username' => 'admin',
                'password' => Hash::make('123456')
            ]
        );
    }
}
