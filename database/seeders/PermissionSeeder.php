<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\PermissionEnum;
use App\RoleEnum;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::MANAGE_USERS->value]);
        Permission::create(['name' => PermissionEnum::DELETE_CLIENTS->value]);
        Permission::create(['name' => PermissionEnum::DELETE_PROJECTS->value]);
        Permission::create(['name' => PermissionEnum::DELETE_TASKS->value]);

        $role = Role::findByName(RoleEnum::ADMIN->value);
        $role->givePermissionTo(PermissionEnum::MANAGE_USERS->value);
        $role->givePermissionTo(PermissionEnum::DELETE_CLIENTS->value);
        $role->givePermissionTo(PermissionEnum::DELETE_PROJECTS->value);
        $role->givePermissionTo(PermissionEnum::DELETE_TASKS->value);
    }
}
