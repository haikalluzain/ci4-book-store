<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table            = 'sales';
	protected $protectFields    = false;
	protected $useTimestamps = true;

	public function getAll()
	{
		return $this->builder()
								->select('sales.*, books.title book, books.slug book_slug, si.quantity qty, buyer.email buyer_email, buyer.fullname buyer_name')
								->join('users buyer', 'buyer.id = sales.user_id')
								->join('sale_items si', 'si.sale_id = sales.id')
								->join('books', 'books.id = si.book_id')
								->get()->getResult();
	}
}
