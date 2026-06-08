<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id'; // OK kalau di DB benar ada 'id'

    protected $allowedFields = [
    'user_id',
    'nama_pembeli',
    'email',
    'no_telepon',
    'alamat',
    'deskripsi',
    'nama_produk',
    'harga',
    'jumlah',
    'total',
    'status',
    'metode_pembayaran',
    'created_at'
];
}