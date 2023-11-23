<?php

namespace App\Database\Seeds;

use App\Models\GenreModel;
use CodeIgniter\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $db = db_connect();
        $db->query("SET FOREIGN_KEY_CHECKS=0;");
        $genreModel = new GenreModel();
        $genreModel->builder()->truncate();

        $data = [
            [
                'display_name' => 'Rommance'
            ],
            [
                'display_name' => 'Action'
            ],
            [
                'display_name' => 'Fiction'
            ],
            [
                'display_name' => 'Science Fiction'
            ],
            [
                'display_name' => 'Fantasy'
            ],
            [
                'display_name' => 'Mystery'
            ],
            [
                'display_name' => 'Thriller'
            ],
            [
                'display_name' => 'Horror'
            ],
            [
                'display_name' => 'Historical'
            ]
        ];

        foreach ($data as $genre) {
            $genreModel->insert([
                'name' => slug($genre['display_name']),
                'display_name' => $genre['display_name']
            ]);
        }

        $db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
}
