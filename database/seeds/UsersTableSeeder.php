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
                'password'           => '$2y$10$7GQ5.fycDSy1saTeMEe0VuXk.h2xCtDbDBUmskfRerqJSgp22m73O',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2019-10-24 17:25:06',
                'other_names'        => '',
                'phone'              => '',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
