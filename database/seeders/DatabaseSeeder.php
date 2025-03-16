<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);

        User::factory(15)->create();
        User::factory()->create([
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'Admin@123',
        ])->syncRoles(RoleEnum::ADMIN);
    }
}
