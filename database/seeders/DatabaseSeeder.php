<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'emp_id' => 'EMP001',
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'), // Hash the password
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'emp_id' => 'EMP002',
                'name' => 'Supervisor User',
                'email' => 'supervisor@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'supervisor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'emp_id' => 'EMP003',
                'name' => 'Agent User',
                'email' => 'agent@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'agent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'emp_id' => 'EMP004',
                'name' => 'Reporter User',
                'email' => 'reporter@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'reporter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
