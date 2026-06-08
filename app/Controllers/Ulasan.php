<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UlasanModel;

class Ulasan extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $ulasanModel = new UlasanModel();

        $data = [

            'produk' => $produkModel->findAll(),

            'ulasan' => $ulasanModel
                ->select('ulasan.*, produk.nama, produk.gambar, produk.merek, produk.kategori')
                ->join('produk', 'produk.id_produk = ulasan.id_produk')
                ->findAll()

        ];

        return view('ulasan', $data);
    }

    public function simpan()
    {
        $ulasanModel = new UlasanModel();

        $ulasanModel->save([

            'id_produk' => $this->request->getPost('id_produk'),

            'nama_user' => $this->request->getPost('nama_user'),

            'rating' => $this->request->getPost('rating'),

            'komentar' => $this->request->getPost('komentar'),

            'tanggal' => date('Y-m-d H:i:s')

        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim');
    }
}