<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MasterUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!env('ADMIN_PASSWORD')) throw new \ErrorException('Admin password cannot be empty in .env file.');

        User::updateOrCreate(
            ['email' => 'admin@rendainveste.com.br'],
            [
                'name' => 'Admin',
                'email' => 'admin@rendainveste.com.br',
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'rules' => 'admin',
            ],
        );
    }
}
