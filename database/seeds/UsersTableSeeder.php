<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$UoFsFWK/n7Nwee9mJCMHx.SfCzZAWzrn/kjnF.7hSBr0JSYaAOUWi',
            'remember_token' => null,
            'created_at'     => '2019-06-03 17:34:43',
            'updated_at'     => '2019-06-03 17:34:43',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
