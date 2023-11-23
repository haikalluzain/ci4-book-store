<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkModel extends Model
{
    protected $table            = 'works';
    protected $protectFields    = false;
	protected $useTimestamps = true;

    public function getAll()
	{
		return $this->builder()->get()->getResult();
	}

	public function findById($id)
	{
		return $this->builder()->where('id', $id)->get()->getFirstRow();
	}
}
