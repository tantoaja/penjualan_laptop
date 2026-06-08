<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table = 'ulasan';

    protected $primaryKey = 'id_ulasan';

    protected $allowedFields = [
        'id_produk',
        'nama_user',
        'rating',
        'komentar'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'tanggal';

    protected $updatedField = '';
}