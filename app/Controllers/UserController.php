<?php

namespace App\Controllers;

use Myth\Auth\Entities\User;

class UserController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->user->orderBy('updated_at', 'DESC')->where('users.id !=', user_id())->getAll();
        return view('pages/dashboard/user/index', [
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
        $roles = $this->authGroup->orderBy('id', 'ASC')->getAll();
        return view('pages/dashboard/user/create', [
            'roles' => $roles
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar(['fullname', 'email', 'password', 'role']);

        $newUser = new User([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'username' => slug($data['fullname'], '_'),
            'password' => $data['password'],
        ]);

        $newUser->activate();
        $this->user = $this->user->withGroup($data['role']);
        $this->user->save($newUser);

        return redirect('users')->with('message', 'User created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->user->find($id);
        return view('pages/dashboard/user/edit', [
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
        $data = $this->request->getVar(['fullname', 'email', 'active']);
        $this->user->save([
            'id' => $id,
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'username' => slug($data['fullname'], '_'),
            'active' => $data['active'],
        ]);


        return redirect('users')->with('message', 'Update user successfully');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->user->delete($id);
        return redirect('users')->with('message', 'User deleted successfully');
    }
}
