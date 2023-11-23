<?php

namespace App\Database\Seeds;

use App\Models\PublisherModel;
use CodeIgniter\Database\Seeder;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        $db = db_connect();
        $db->query("SET FOREIGN_KEY_CHECKS=0;");
        $publisherModel = new PublisherModel();
        $publisherModel->builder()->truncate();

        $faker = \Faker\Factory::create();

        $data = [
            [
                'name' => 'Gramedia Pustaka Utama',
                'email' => 'gramedia@mail.co.id'
            ],
            [
                'name' => 'Mizan Pustaka',
                'email' => 'mizan@mail.co.id'
            ],
            [
                'name' => 'Bentang Pustaka',
                'email' => 'bentang@mail.co.id'
            ],
            [
                'name' => 'Penerbit Erlangga',
                'email' => 'erlangga@mail.co.id'
            ],
            [
                'name' => 'Penerbit Republika',
                'email' => 'republika@mail.co.id'
            ]
        ];

        foreach ($data as $pub)
        {
            $publisherModel->insert([
                'name' => $pub['name'],
                'slug' => slug($pub['name']),
                'email' => $pub['email'],
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address()
            ]);
        }
    }
}
