<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CheckoutController extends BaseController
{

    public function index()
    {
        $data = $this->sale->where('sales.user_id', user_id())->getAll();
        return view('pages/order-history', [
            'data' => $data
        ]);
    }

    public function show($slug)
    {
        $query = [
            'books.slug' => $slug
        ];
        $book = $this->book->getDetail($query);
        return view('pages/checkout', [
            'book' => $book,
            'qty' => $this->request->getVar('qty'),
            'shipping_fee' => 20000
        ]);
    }

    public function checkout()
    {
        // dd($this->request->getVar());
        $payloads = $this->request->getVar();

        $book = $this->book->findById($payloads['book_id']);
        $total_price = (intval($book->price) * intval($payloads['qty'])) + intval($payloads['shipping_fee']);
        $invoice_number = "BS" . "-" . time();
        $this->book->save([
            'id' => $book->id,
            'quantity' => $book->quantity - intval($payloads['qty'])
        ]);

        if ($book->quantity < 1) {
            return redirect('main-book-detail', $book->slug)->with('error', 'Stok buku tidak tersedia');
        }

        $this->shipping->insert([
            'user_id' => user_id(),
            'recipient' => $payloads['recipient'],
            'phone' => $payloads['phone'],
            'address' => $payloads['address']
        ]);

        // Create Sale
        $this->sale->insert([
            'user_id' => user_id(),
            'invoice_number' => $invoice_number,
            'shipping_id' => $this->shipping->getInsertID(),
            'shipping_fee' => $payloads['shipping_fee'],
            'total_price' => $total_price,
            'status' => 'PAID'
        ]);

        // Create Sale Item
        $this->saleItem->insert([
            'sale_id' => $this->sale->getInsertID(),
            'book_id' => $payloads['book_id'],
            'price' => $book->price,
            'quantity' => $payloads['qty']
        ]);

        return redirect('orders')->with('message', 'Transaksi berhasil');
    }
}
