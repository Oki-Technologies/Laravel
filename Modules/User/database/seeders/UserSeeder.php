<?php

namespace Modules\User\database\seeders;

use Illuminate\Database\Seeder;
use Modules\User\app\Models\User;

// use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() > 0) {
            return;
        }

        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'username' => 'admin',
                'phone' => '23400000000000',
                'email' => 'admin@' . env('APP_DOMAIN', 'example.com'),
                'password' => '$1Password;',
                'password_confirmation' => '$1Password;',
                'terms' => true,
            ],
            [
                'first_name' => 'Demo',
                'last_name' => 'User',
                'username' => 'user',
                'phone' => '23400000000001',
                'email' => 'user@' . env('APP_DOMAIN', 'example.com'),
                'password' => '$1Password;',
                'password_confirmation' => '$1Password;',
                'terms' => true,
            ]
        ];

        foreach ($users as $data) {
            $exists = User::where('username', $data['username'])
                ->orWhere('phone', $data['phone'])
                ->orWhere('email', $data['email'])
                ->first();

            if (!$exists) {
                $user = User::factory()->create($data);

                // @Todo: check if model/class exists
                if (in_array($user->username, ['admin', 'user'])) {
                    $user->assignRole($user->username);
                }
            }
        }
    }
}
