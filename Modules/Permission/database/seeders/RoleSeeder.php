<?php

namespace Modules\Permission\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\app\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super-admin',
            'admin',
            'developer',
            'beta',
            'user',
        ];

        foreach ($roles ?? [] as $item) {
            Role::firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
