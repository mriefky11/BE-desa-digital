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
        $admin = User::firstOrCreate(
            ['email' => 'admin@yopmail.com'],
            [
                'id' => (string) Str::uuid(),
                'name' => 'admin',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole('admin');

        $kk = User::firstOrCreate(
            ['email' => 'user_kk1@yopmail.com'],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Kepala Keluarga',
                'password' => bcrypt('password'),
            ]
        );
        $kk->assignRole('head-of-family');

        UserFactory::new()->count(15)->create();
    }
}
