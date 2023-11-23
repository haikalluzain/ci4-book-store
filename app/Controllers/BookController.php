<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->book->orderBy('updated_at', 'DESC')->getAll();
        return view('pages/dashboard/book/index', [
            'data' => $data
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $authors = $this->author->getAll();
        $publishers = $this->publisher->getAll();
        $genres = $this->genre->getAll();
        return view('pages/dashboard/book/create', [
            'authors' => $authors,
            'publishers' => $publishers,
            'genres' => $genres
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // $validator = $this->validate([
        //     'cover' => [
        //         'rules' => 'required|uploaded[cover]|max_size[cover, ]' 
        //     ]
        // ])
        // if (!$this =)

        $payloads = $this->request->getVar();
        $fileCover = $this->request->getFile('cover');
        $fileName = $this->generateImageName($fileCover->getName(), $fileCover->getExtension());
        $fileCover->move('img/books', $fileName);
        $this->book->insert([
            'title' => $payloads['title'],
            'slug' => slug($payloads['title']),
            'genre_id' => $payloads['genre'],
            'author_id' => $payloads['author'],
            'publisher_id' => $payloads['publisher'],
            'price' => $payloads['price'],
            'total_pages' => $payloads['total_pages'],
            'quantity' => $payloads['quantity'],
            'release_date' => $payloads['release_date'],
            'description' => $payloads['description'],
            'cover' => $fileName,
            'updated_by' => user_id()
        ]);

        return redirect('books')->with('message', 'Book created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $book = $this->book->findById($id);
        $authors = $this->author->getAll();
        $publishers = $this->publisher->getAll();
        $genres = $this->genre->getAll();
        return view('pages/dashboard/book/edit', [
            'book' => $book,
            'authors' => $authors,
            'publishers' => $publishers,
            'genres' => $genres
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $payloads = $this->request->getVar();

        $this->book->save([
            'id' => $id,
            'title' => $payloads['title'],
            'slug' => slug($payloads['title']),
            'genre_id' => $payloads['genre'],
            'author_id' => $payloads['author'],
            'publisher_id' => $payloads['publisher'],
            'price' => $payloads['price'],
            'total_pages' => $payloads['total_pages'],
            'quantity' => $payloads['quantity'],
            'release_date' => $payloads['release_date'],
            'description' => $payloads['description'],
            // 'cover' => $fileName,
            'updated_by' => user_id()
        ]);

        return redirect('books')->with('message', 'Book updated successfully');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->book->delete($id);
        return redirect('books')->with('message', 'Book deleted successfully');
    }

    private function generateImageName($filename, $ext)
    {
        return time() . '_' . bin2hex(random_bytes(10)) . '_' . slug($filename) . '.' . $ext;
    }
}
