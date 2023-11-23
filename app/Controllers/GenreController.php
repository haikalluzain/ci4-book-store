<?php

namespace App\Controllers;
class GenreController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $genres = $this->genre->orderBy('updated_at', 'DESC')->get()->getResult();
        return view('pages/dashboard/genre/index', [
            'data' => $genres
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
        return view('pages/dashboard/genre/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar(['name']);
        $this->genre->save([
            'name' => slug($data['name']),
            'display_name' => $data['name']
        ]);

        return redirect('genres')->with('message', 'Genre created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->genre->find($id);
        return view('pages/dashboard/genre/edit', [
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
        $data = $this->request->getVar(['name']);
        $this->genre->save([
            'id' => $id,
            'name' => slug($data['name']),
            'display_name' => $data['name']
        ]);


        return redirect('genres')->with('message', 'Genre updated successfully');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->genre->delete($id);
        return redirect('genres')->with('message', 'Genre deleted successfully');
    }
}
