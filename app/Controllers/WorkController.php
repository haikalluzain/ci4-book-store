<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WorkController extends BaseController
{
    public function index()
    {
        $works = $this->work->orderBy('created_at', 'DESC')->get()->getResult();
        $certificates = $this->certificate->where('user_id', user_id())->orderBy('created_at', 'DESC')->get()->getResult();
        return view('pages/dashboard/work/index', [
            'data' => $works,
            'certificate' => count($certificates)
        ]);
    }

    public function new()
    {
        return view('pages/dashboard/work/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar();
        $this->work->save([
            'company_name' => $data['company_name'],
            'position' => $data['position'],
            'year' => $data['year'],
            'description' => $data['description'],
            'user_id' => user_id()
        ]);

        return redirect('works')->with('message', 'Work created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->work->findById($id);
        return view('pages/dashboard/work/edit', [
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
        $this->work->save([
            'id' => $id,
            'company_name' => $data['company_name'],
            'position' => $data['position'],
            'year' => $data['year'],
            'description' => $data['description'],
        ]);


        return redirect('works')->with('message', 'Work updated successfully');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->work->delete($id);
        return redirect('works')->with('message', 'Work deleted successfully');
    }
}
