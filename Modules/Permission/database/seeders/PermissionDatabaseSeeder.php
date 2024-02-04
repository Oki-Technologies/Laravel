<?php

namespace Modules\Permission\database\seeders;

use Illuminate\Database\Seeder;

class PermissionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
