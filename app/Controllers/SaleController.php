<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SaleController extends BaseController
{
    public function index()
    {
        $data = $this->sale->getAll();
        return view('pages/dashboard/sale/index', [
            'data' => $data
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update($id)
    {

    }
}
