<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Authorization\GroupModel;

class AuthGroupSeeder extends Seeder
{
    public function run()
    {
        $db = db_connect();
        $db->query("SET FOREIGN_KEY_CHECKS=0;");

        $role = new GroupModel();
        $role->builder()->truncate();

        $roles = [
            [
                'name' => 'administrator',
                'description' => 'Administrator'
            ],
            [
                'name' => 'user',
                'description' => 'User'
            ]
        ];
        $role->insertBatch($roles);
        $db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
}
