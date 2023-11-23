<?php

namespace App\Database\Seeds;

use App\Models\AuthorModel;
use App\Models\BookModel;
use App\Models\GenreModel;
use App\Models\PublisherModel;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Models\UserModel;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AuthGroupSeeder');
        $this->call('GenreSeeder');
        $this->call('AuthorSeeder');
        $this->call('PublisherSeeder');
        $this->call('UserSeeder');
        $this->call('BookSeeder');
    }
}
