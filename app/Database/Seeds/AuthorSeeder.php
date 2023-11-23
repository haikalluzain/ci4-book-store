<?php

namespace App\Database\Seeds;

use App\Models\AuthorModel;
use CodeIgniter\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $db = db_connect();
        $db->query("SET FOREIGN_KEY_CHECKS=0;");
        $authorModel = new AuthorModel();
        $authorModel->builder()->truncate();
        $faker = \Faker\Factory::create();

        $data = [
            [
                'name' => 'William Shakespeare',
                'email' => 'william@gmail.com'
            ],
            [
                'name' => 'Sir Arthur Ignatius Conan Doyle',
                'email' => 'conandyle@gmail.com'
            ],
            [
                'name' => 'Tere Liye',
                'email' => 'tereliye@gmail.com'
            ],
            [
                'name' => 'George Orwell',
                'email' => 'gorge@gmail.com'
            ],
            [
                'name' => 'Andrea Hirata',
                'email' => 'andreahirata@gmail.com'
            ],
            [
                'name' => 'Pramoedya Ananta Toer',
                'email' => 'pramoedyaanantatoer@gmail.com'
            ],
        ];

        foreach ($data as $author) {
            $authorModel->insert([
                'name' => $author['name'],
                'email' => $author['email'],
                'phone' => $faker->phoneNumber(),
                'description' => $faker->text(50)
            ]);
        }

        $db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
}
