<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingModel extends Model
{
    protected $table            = 'shippings';
	protected $protectFields    = false;
	protected $useTimestamps = true;

	public function getAll()
	{
		return $this->builder()->get()->getResult();
	}
}
