<?php

namespace App\Controllers;

use App\Models\OrderModel;

class OrderController extends BaseController
{
    public function save()
    {
        $model = new OrderModel();

        // ambil harga & jumlah
        $harga  = (int) $this->request->getPost('harga');
        $jumlah = (int) $this->request->getPost('jumlah');

        // hitung total
        $total = $harga * $jumlah;

        $data = [
    'user_id'        => session()->get('user_id'),

    'id_produk'      => $this->request->getPost('id_produk'),

    'nama_pembeli'   => session()->get('nama'),
    'email'          => session()->get('email'),

    'nama_produk'    => $this->request->getPost('nama_produk'),

    'harga'          => $harga,
    'jumlah'         => $jumlah,
    'total'          => $total,

    'no_telepon'     => $this->request->getPost('no_telepon'),

    'alamat'         => $this->request->getPost('alamat'),

    'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),

    'status'         => 'pending',
    'created_at'     => date('Y-m-d H:i:s')
];

        $model->insert($data);

        return redirect()->back()->with('success', 'Order berhasil dibuat');
    }

    // CANCEL ORDER
    public function cancel($id)
    {
        $model = new OrderModel();

        $order = $model->find($id);

        // cek order ada atau tidak
        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }

        // keamanan
        if ($order['user_id'] != session()->get('user_id')) {
            return redirect()->back();
        }

        // hanya pending yang bisa dicancel
        if ($order['status'] != 'pending') {
            return redirect()->back()->with('error', 'Pesanan tidak bisa dibatalkan');
        }

        // hapus order
        $model->delete($id);

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan');
    }
}