<?php

namespace App\Database\Seeds;

use App\Models\AuthGroupModel;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $db = db_connect();
        $db->query("SET FOREIGN_KEY_CHECKS=0;");
        $db->query('TRUNCATE TABLE auth_groups_users');
        $userModel = new UserModel();
        $roleModel = new AuthGroupModel();
        $userModel->builder()->truncate();

        $role_user = $roleModel->where('name', 'user')->first();
        $role_admin = $roleModel->where('name', 'administrator')->first();

        $data = [
            [
                'fullname' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678',
                'role' => $role_admin['name']
            ],
            [
                'fullname' => 'Main User',
                'email' => 'user@gmail.com',
                'password' => '12345678',
                'role' => $role_user['name']
            ],
            [
                'fullname' => 'Haikal',
                'email' => 'haikal@gmail.com',
                'password' => '12345678',
                'role' => $role_admin['name']
            ]
        ];

        foreach ($data as $user) {
            $newUser = new User([
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'username' => slug($user['fullname'], '_'),
                'password' => $user['password']
            ]);

            $newUser->activate();
            $userModel = $userModel->withGroup($user['role']);
            $userModel->save($newUser);

        }

        $db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
}
