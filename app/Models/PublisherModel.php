<?php

namespace App\Models;

use CodeIgniter\Model;

class PublisherModel extends Model
{
    protected $table            = 'publishers';
    protected $protectFields    = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';

    public function getAll()
    {
        return $this->builder()->get()->getResult();
    }

    public function findById($id)
	{
		return $this->builder()->where('id', $id)->get()->getFirstRow();
	}
}
