<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => '$2y$10$vM9OLn3bopHQB./0oKUuxOxz9PF/jE7.MZ9Bu9Lcnwg/s//sx.tgC',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2019-10-24 16:01:25',
                'other_names'        => '',
                'phone'              => '',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
