<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CareerObjectController extends BaseController
{
    public function __construct()
    {
        helper('url'); 
    }

    public function new()
    {
        $data = $this->careerObject->where('user_id', user_id())->get()->getFirstRow();
        if ($data) {
            return redirect()->to('dashboard/cv/career-object/' . $data->id . '/summary');
        }
        return view('pages/dashboard/career/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar();
        $this->careerObject->save([
            'career_object' => $data['career_object'],
            'user_id' => user_id()
        ]);

        return redirect()->to('dashboard/cv/career-object/' . $this->careerObject->getInsertID() . '/summary')->with('message', 'Career Object created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->careerObject->findById($id);
        return view('pages/dashboard/career/index', [
            'data' => $data
        ]);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->careerObject->findById($id);
        return view('pages/dashboard/career/edit', [
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
        $data = $this->request->getVar();
        $this->careerObject->save([
            'id' => $id,
            'career_object' => $data['career_object']
        ]);

        return redirect()->to('dashboard/cv/career-object/' . $id . '/summary')->with('message', 'Career Object updated successfully');
    }
}
