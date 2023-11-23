<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleItemModel extends Model
{
    protected $table            = 'sale_items';
	protected $protectFields    = false;
	protected $useTimestamps = true;

	public function getAll()
	{
		return $this->builder()->get()->getResult();
	}
}
