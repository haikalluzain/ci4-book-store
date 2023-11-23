<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CertificateController extends BaseController
{
    public function index()
    {
        $certificates = $this->certificate->orderBy('created_at', 'DESC')->get()->getResult();
        return view('pages/dashboard/certificate/index', [
            'data' => $certificates
        ]);
    }

    public function new()
    {
        return view('pages/dashboard/certificate/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar();
        $this->certificate->save([
            'certificate_name' => $data['certificate_name'],
            'organization' => $data['organization'],
            'year' => $data['year'],
            'user_id' => user_id()
        ]);

        return redirect('certificates')->with('message', 'Certificate created successfully');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->certificate->findById($id);
        return view('pages/dashboard/certificate/edit', [
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
        $this->certificate->save([
            'id' => $id,
            'certificate_name' => $data['certificate_name'],
            'organization' => $data['organization'],
            'year' => $data['year']
        ]);


        return redirect('certificates')->with('message', 'Certificate updated successfully');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->certificate->delete($id);
        return redirect('certificates')->with('message', 'Certificate deleted successfully');
    }
}
