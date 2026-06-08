<?php

namespace App\Controllers;

use App\Models\OrderModel;

class Kurir extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();

        $data = [
            'orders' => $orderModel
                ->where('status', 'shipping')
                ->orderBy('created_at', 'DESC')
                ->findAll()
        ];

        return view('kurir/dashboard', $data);
    }

    public function formSelesai($id)
    {
        $orderModel = new OrderModel();

        $data['order'] = $orderModel->find($id);

        return view('kurir/form_selesai', $data);
    }

    public function prosesSelesai($id)
{
    $orderModel = new OrderModel();

    $foto = $this->request->getFile('foto_bukti');

    $namaFoto = null;

    if ($foto && $foto->isValid())
    {
        $namaFoto = $foto->getRandomName();

        $foto->move(
            FCPATH . 'uploads/bukti_pengiriman/',
            $namaFoto
        );
    }

    $db = \Config\Database::connect();

    $db->table('kurir')->insert([
        'order_id' => $id,
        'nama_penerima' => $this->request->getPost('nama_penerima'),
        'catatan_pengiriman' => $this->request->getPost('catatan_pengiriman'),
        'foto_bukti' => $namaFoto,
        'tanggal_kirim' => date('Y-m-d H:i:s')
    ]);

    $orderModel->update($id, [
        'status' => 'selesai'
    ]);

    return redirect()->to('/kurir')
                     ->with('success', 'Pesanan berhasil diselesaikan');
}
}