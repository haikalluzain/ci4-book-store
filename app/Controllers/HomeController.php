<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data = $this->book->getAll();
        return view('pages/index', [
            'books' => $data
        ]);
    }

    public function showBookDetail($slug)
    {
        $query = [
            'books.slug' => $slug
        ];
        $book = $this->book->getDetail($query);
        return view('pages/detail', [
            'book' => $book
        ]);
    }
}
