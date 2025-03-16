<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\RoleEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(15)->create();
        User::factory()->create([
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'Admin@123',
        ])->syncRoles(RoleEnum::ADMIN);
    }
}
