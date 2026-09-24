<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'todo.view',
            'todo.create',
            'todo.edit',
            'todo.delete',
            'todo.complete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Create roles
        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $user = Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        // Admin gets all permissions
        $admin->givePermissionTo(Permission::all());

        // User gets todo permissions
        $user->givePermissionTo([
            'todo.view',
            'todo.create',
            'todo.edit',
            'todo.delete',
            'todo.complete',
        ]);
    }
}