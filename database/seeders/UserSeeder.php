<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan user dengan role admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123')
        ]);
        $admin->assignRole('admin');

        // Menambahkan user dengan role guru
        $guru = User::create([
            'name' => 'Guru User',
            'email' => 'guru@example.com',
            'password' => Hash::make('password123')
        ]);
        $guru->assignRole('guru');

        // Menambahkan user dengan role siswa
        $siswa = User::create([
            'name' => 'Siswa User',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password123')
        ]);
        $siswa->assignRole('siswa');
    }
}

