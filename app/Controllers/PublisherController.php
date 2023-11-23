<?php

namespace App\Controllers;

class PublisherController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->publisher->orderBy('updated_at', 'DESC')->getAll();
        return view('pages/dashboard/publisher/index', [
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
        return view('pages/dashboard/publisher/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar(['name', 'email', 'phone', 'address']);
        $this->publisher->save([
            'name' => $data['name'],
            'slug' => slug($data['name']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);

        return redirect('publishers')->with('message', 'Publisher created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->publisher->findById($id);
        return view('pages/dashboard/publisher/edit', [
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
        $data = $this->request->getVar(['name', 'email', 'phone', 'address']);
        $this->publisher->save([
            'id' => $id,
            'name' => $data['name'],
            'slug' => slug($data['name']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);

        return redirect('publishers')->with('message', 'Publisher updated successfully');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->publisher->delete($id);
        return redirect('publishers')->with('message', 'Publisher deleted successfully');
    }
}
