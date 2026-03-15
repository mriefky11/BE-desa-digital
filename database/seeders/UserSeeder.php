<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@yopmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        User::create([
            'id' => Str::uuid(),
            'name' => 'Kepala Keluarga',
            'email' => 'user_kk1@yopmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('head-of-family');

        UserFactory::new()->count(15)->create();
    }
}
