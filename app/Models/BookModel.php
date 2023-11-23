<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'books';
    protected $protectFields    = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';

    public function getAll()
    {
        $builder = $this->builder();
        $builder->select('books.*, g.display_name genre, a.name author, p.name publisher');
        $builder->join('genres g', 'g.id = books.genre_id');
        $builder->join('authors a', 'a.id = books.author_id');
        $builder->join('publishers p', 'p.id = books.publisher_id');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDetail($queries)
    {
        $builder = $this->builder();
        $builder->select('books.*, g.display_name genre, a.name author, p.name publisher');

        foreach ($queries as $key => $query) {
            $builder->where($key, $query);
        }

        $builder->join('genres g', 'g.id = books.genre_id');
        $builder->join('authors a', 'a.id = books.author_id');
        $builder->join('publishers p', 'p.id = books.publisher_id');
        $query = $builder->get();
        return $query->getFirstRow();
    }

    public function findById($id)
    {
        $book = $this->builder()->where('id', $id)->get()->getFirstRow();
        return $book;
    }
}
