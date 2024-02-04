<?php

namespace Modules\Permission\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\app\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // permissions
            'permissions.create',
            'permissions.list',
            'permissions.show',
            'permissions.update',
            'permissions.delete',
            'permissions.delete.permanent',
            'permissions.restore',
            // roles
            'roles.create',
            'roles.list',
            'roles.show',
            'roles.update',
            'roles.delete',
            'roles.delete.permanent',
            'roles.restore',
        ];

        foreach ($permissions ?? [] as $item) {
            Permission::firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
