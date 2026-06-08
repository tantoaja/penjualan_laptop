<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();

        $data['produk'] = $produkModel->findAll();

        return view('produk', $data);
    }
}