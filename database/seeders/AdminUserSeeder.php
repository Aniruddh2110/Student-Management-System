<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hashedPassword = Hash::make('admin123');

        DB::unprepared("
            INSERT INTO users (
                name, email, email_verified_at, password, role, created_at, updated_at
            ) VALUES (
                'Admin User',
                'admin@example.com',
                NOW(),
                '$hashedPassword',
                'admin',
                NOW(),
                NOW()
            );
        ");
    }
}
