<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\OrderModel;
use App\Models\UlasanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $orderModel  = new OrderModel();
        $ulasanModel = new UlasanModel();

        $data = [
            'totalProduk'  => $produkModel->countAll(),
            'totalPesanan' => $orderModel->countAll(),
            'totalUlasan'  => $ulasanModel->countAll(),

            // ORDERS
            'recentOrders' => $orderModel
                ->orderBy('created_at', 'DESC')
                ->findAll(5),

            // ULASAN (FIX HERE)
            'recentUlasan' => $ulasanModel
                ->orderBy('id_ulasan', 'DESC')
                ->findAll(5),
        ];

        return view('admin/dashboard', $data);
    }

    public function profile()
{
    $data = [
        'nama'  => session()->get('nama'),
        'email' => session()->get('email'),
        'role'  => session()->get('role'),
    ];

    return view('admin/profile', $data);
}

public function ulasan()
{
    $ulasanModel = new \App\Models\UlasanModel();

    $keyword = $this->request->getGet('keyword');
    $produk  = $this->request->getGet('produk');
    $rating  = $this->request->getGet('rating');

    $builder = $ulasanModel;

    if ($keyword) {
        $builder = $builder->like('nama_user', $keyword)
                           ->orLike('komentar', $keyword);
    }

    if ($produk) {
        $builder = $builder->where('id_produk', $produk);
    }

    if ($rating) {
        $builder = $builder->where('rating', $rating);
    }

    $data = [
        'ulasan' => $builder->orderBy('id_ulasan', 'DESC')->findAll(),
        'produkList' => (new \App\Models\ProdukModel())->findAll()
    ];

    return view('admin/ulasan', $data);
}

 public function order()
{
    $db = \Config\Database::connect();

    $bulan = $this->request->getGet('bulan');

    $orders = $db->table('orders')
        ->select('
            orders.*,
            kurir.nama_penerima,
            kurir.catatan_pengiriman,
            kurir.foto_bukti,
            kurir.tanggal_kirim
        ')
        ->join('kurir', 'kurir.order_id = orders.id', 'left')
        ->orderBy('orders.created_at', 'DESC')
        ->get()
        ->getResultArray();

    return view('admin/orders', [
        'orders' => $orders,
        'bulanDipilih' => $bulan
    ]);
}

    public function updateStatus($id)
{
    $orderModel = new \App\Models\OrderModel();

    $status = $this->request->getPost('status');

    $orderModel->update($id, [
        'status' => $status
    ]);

    return redirect()->to(base_url('admin'))->with('success', 'Status berhasil diupdate');
}
public function produk()
{
    $model = new ProdukModel();

    $data = [
        'produk' => $model->orderBy('id_produk', 'DESC')->findAll()
    ];

    return view('admin/produk', $data);
}

// CREATE
public function produkCreate()
{
    $model = new ProdukModel();

    $model->save([
        'nama'      => $this->request->getPost('nama'),
        'merek'     => $this->request->getPost('merek'),
        'harga'     => $this->request->getPost('harga'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'kategori'  => $this->request->getPost('kategori'),
        'gambar'    => $this->request->getPost('gambar'),
    ]);

    return redirect()->to(base_url('admin/produk'))->with('success', 'Produk berhasil ditambahkan');
}

// UPDATE
public function produkUpdate($id)
{
    $model = new ProdukModel();

    $model->update($id, [
        'nama'      => $this->request->getPost('nama'),
        'merek'     => $this->request->getPost('merek'),
        'harga'     => $this->request->getPost('harga'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'kategori'  => $this->request->getPost('kategori'),
        'gambar'    => $this->request->getPost('gambar'),
    ]);

    return redirect()->to(base_url('admin/produk'))->with('success', 'Produk berhasil diupdate');
}

// DELETE
public function produkDelete($id)
{
    $model = new ProdukModel();

    $model->delete($id);

    return redirect()->to(base_url('admin/produk'))->with('success', 'Produk berhasil dihapus');
}
public function shipping($id)
{
    $orderModel = new \App\Models\OrderModel();

    $orderModel->update($id, [
        'status' => 'shipping'
    ]);

    return redirect()->to(base_url('admin/order'));
}
public function delete($id_ulasan)
{
    $model = new UlasanModel();

    $model->delete($id_ulasan);

    return redirect()->to('/admin/ulasan')
                     ->with('success', 'Ulasan berhasil dihapus');
}   
public function edit($id)
{
    $model = new ProdukModel();

    $data['produk'] = $model->find($id);

    return view('admin/produk_edit', $data);
}
public function update($id)
{
    $model = new ProdukModel();

    $model->update($id, [
        'nama'      => $this->request->getPost('nama'),
        'merek'     => $this->request->getPost('merek'),
        'harga'     => $this->request->getPost('harga'),
        'kategori'  => $this->request->getPost('kategori'),
        'gambar'    => $this->request->getPost('gambar'),
        'deskripsi' => $this->request->getPost('deskripsi'),
    ]);

    return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diupdate');
}

public function exportLaporan2026()
{
    $bulan = $this->request->getGet('bulan');

    $orderModel = new OrderModel();

    $orders = $orderModel
        ->where('status', 'selesai')
        ->orderBy('created_at', 'ASC')
        ->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->mergeCells('A1:E1');
    $sheet->setCellValue('A1', 'LAPORAN PENJUALAN TAHUN 2026');

    $sheet->setCellValue('A3', 'Tanggal Pesanan');
    $sheet->setCellValue('B3', 'Nama Produk');
    $sheet->setCellValue('C3', 'Nama Pembeli');
    $sheet->setCellValue('D3', 'Jumlah');
    $sheet->setCellValue('E3', 'Total Terjual');

    $row = 4;
    $totalPendapatan = 0;

    foreach ($orders as $o) {

        if (date('Y', strtotime($o['created_at'])) != 2026) {
            continue;
        }

        if (!empty($bulan)) {

            if (date('n', strtotime($o['created_at'])) != $bulan) {
                continue;
            }
        }

        $total = $o['harga'] * $o['jumlah'];

        $sheet->setCellValue('A'.$row,
            date('d-m-Y', strtotime($o['created_at']))
        );

        $sheet->setCellValue('B'.$row, $o['nama_produk']);
        $sheet->setCellValue('C'.$row, $o['nama_pembeli']);
        $sheet->setCellValue('D'.$row, $o['jumlah']);
        $sheet->setCellValue('E'.$row, $total);

        $totalPendapatan += $total;
        $row++;
    }

    $sheet->setCellValue('D'.($row+1), 'TOTAL PENDAPATAN');
    $sheet->setCellValue('E'.($row+1), $totalPendapatan);

    foreach (range('A','E') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $filename = 'Laporan_Penjualan_2026.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

public function exportRatingTerbaik()
{
    $db = \Config\Database::connect();

    $data = $db->query("
        SELECT
            p.id_produk,
            p.nama,
            AVG(u.rating) AS rata_rating,
            COUNT(u.id_ulasan) AS total_ulasan
        FROM ulasan u
        JOIN produk p ON p.id_produk = u.id_produk
        GROUP BY p.id_produk
        ORDER BY rata_rating DESC
    ")->getResultArray();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Produk');
    $sheet->setCellValue('C1', 'Rating');
    $sheet->setCellValue('D1', 'Jumlah Ulasan');

    $row = 2;
    $no = 1;

    foreach ($data as $d) {

        $sheet->setCellValue('A'.$row, $no++);
        $sheet->setCellValue('B'.$row, $d['nama']);
        $sheet->setCellValue('C'.$row, round($d['rata_rating'],2));
        $sheet->setCellValue('D'.$row, $d['total_ulasan']);

        $row++;
    }

    foreach(range('A','D') as $col){
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $filename = 'Produk_Rating_Terbaik.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.$filename.'"');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

}