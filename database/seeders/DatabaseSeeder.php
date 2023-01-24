<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create([
            'name' => 'Manager',
        ]);

        Role::factory()->create([
            'name' => 'Employee',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@example.com',
            'role_id' => 2
        ]);
    }
}
