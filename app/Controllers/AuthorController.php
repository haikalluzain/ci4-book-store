<?php

namespace App\Controllers;

class AuthorController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->author->orderBy('updated_at', 'DESC')->getAll();
        return view('pages/dashboard/author/index', [
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
        return view('pages/dashboard/author/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar(['name', 'email', 'phone']);
        $this->author->save([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);

        return redirect('authors')->with('message', 'Author created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->author->findById($id);
        return view('pages/dashboard/author/edit', [
            'data' => $data
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getVar(['name', 'email', 'phone']);
        $this->author->save([
            'id' => $id,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);

        return redirect('authors')->with('message', 'Author updated successfully');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->author->delete($id);
        return redirect('authors')->with('message', 'Author deleted successfully');
    }
}
