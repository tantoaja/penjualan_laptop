<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Pesanan</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { font-family: 'Poppins', sans-serif; }
</style>
</head>

<body class="bg-gray-100 flex">

<!-- ================= SIDEBAR (SAMA SEPERTI DASHBOARD) ================= -->
<aside class="w-72 bg-white shadow-lg h-screen fixed left-0 top-0 p-6">

    <div class="flex items-center gap-3 mb-10">
        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">
            LS
        </div>
        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
    </div>

    <!-- MENU -->
    <nav class="space-y-3">

        <?php $uri = service('uri'); ?>

        <!-- DASHBOARD -->
        <a href="<?= base_url('admin') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == '') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-home"></i> Dashboard
        </a>

        <!-- PROFILE -->
        <a href="<?= base_url('admin/profile') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == 'profile') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-user"></i> Profile
        </a>

        <!-- PESANAN / RIWAYAT -->
        <a href="<?= base_url('admin/order') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == 'order') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-shopping-cart"></i> Pesanan
        </a>

        <!-- PRODUK -->
        <a href="<?= base_url('admin/produk') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100">
            <i class="fa fa-laptop"></i> Produk
        </a>

        <!-- ULASAN -->
        <a href="<?= base_url('admin/ulasan') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == 'ulasan') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-star"></i> Ulasan
        </a>

        <!-- LOGOUT -->
        <a href="<?= base_url('logout') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 mt-10">
            <i class="fa fa-sign-out"></i> Logout
        </a>

    </nav>
</aside>

<!-- ================= CONTENT ================= -->
<!-- ================= CONTENT ================= -->
<main class="ml-72 w-full p-10">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Manajemen Pesanan</h2>
        <p class="text-gray-500">Workflow Pending → Shipping → Selesai</p>
    </div>

    <!-- ================= GRID PENDING + SHIPPING ================= -->
    <div class="grid md:grid-cols-2 gap-6">

        <!-- ================= PENDING ================= -->
        <div class="bg-white rounded-3xl shadow p-6">

            <h3 class="text-lg font-bold mb-4 text-yellow-500">
                🟡 Pending Pesanan
            </h3>

            <?php foreach($orders as $o): ?>
            <?php if($o['status'] == 'pending'): ?>

            <div class="border rounded-xl p-4 mb-3 bg-gray-50">

                <div class="font-semibold"><?= $o['nama_pembeli'] ?></div>
                <div class="text-xs text-gray-500"><?= $o['nama_produk'] ?></div>

                <div class="text-xs mt-2 text-gray-500">
                    📍 <?= $o['alamat'] ?>
                </div>

                <div class="text-xs text-gray-500">
                    💳 <?= $o['metode_pembayaran'] ?? 'COD' ?>
                </div>
                <div class="text-xs text-gray-500">
                    jumlah <?= $o['jumlah'] ?? 'COD' ?>
                </div>
                <div class="text-xs text-gray-500">
                    total harg <?= number_format(($o['harga'] ?? 0) * ($o['jumlah'] ?? 0), 0, ',', '.') ?>
                </div>

                <div class="mt-3 flex justify-between items-center">

                    <span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded">
                        Pending
                    </span>

                    <a href="<?= base_url('admin/order/shipping/'.$o['id']) ?>"
                       class="bg-indigo-600 text-white text-xs px-3 py-2 rounded-lg">
                        Kirim
                    </a>

                </div>

            </div>

            <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <!-- ================= SHIPPING ================= -->
        <div class="bg-white rounded-3xl shadow p-6">

            <h3 class="text-lg font-bold mb-4 text-blue-500">
                🔵 Sedang Dikirim
            </h3>

            <?php foreach($orders as $o): ?>
            <?php if($o['status'] == 'shipping'): ?>

            <div class="border rounded-xl p-4 mb-3 bg-gray-50">

                <div class="font-semibold"><?= $o['nama_pembeli'] ?></div>
                <div class="text-xs text-gray-500"><?= $o['nama_produk'] ?></div>

                <div class="text-xs mt-2 text-gray-500">
                    📍 <?= $o['alamat'] ?>
                </div>

                <div class="mt-2">
                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">
                        Sedang Dikirim
                    </span>
                </div>

            </div>

            <?php endif; ?>
            <?php endforeach; ?>

        </div>

    </div>

   <!-- ================= PESANAN SELESAI ================= -->
<div class="mt-10 bg-white rounded-3xl shadow p-6">

    <?php
    $bulanDipilih = $_GET['bulan'] ?? '';

    $totalPendapatan = 0;

    foreach($orders as $o){

        if($o['status'] != 'selesai'){
            continue;
        }

        if($bulanDipilih != ''){

            if(date('n', strtotime($o['created_at'])) != $bulanDipilih){
                continue;
            }

            if(date('Y', strtotime($o['created_at'])) != 2026){
                continue;
            }
        }

        $totalPendapatan += ($o['harga'] * $o['jumlah']);
    }
    ?>

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

        <div>

            <h3 class="text-lg font-bold text-green-600 mb-3">
                ✅ Pesanan Selesai
            </h3>

            <form method="get" action="<?= base_url('admin/order') ?>" class="flex gap-2">

                <select name="bulan"
                        class="border rounded-lg px-3 py-2">

                    <option value="">Semua Bulan 2026</option>

                    <option value="1" <?= ($bulanDipilih==1)?'selected':'' ?>>Januari</option>
                    <option value="2" <?= ($bulanDipilih==2)?'selected':'' ?>>Februari</option>
                    <option value="3" <?= ($bulanDipilih==3)?'selected':'' ?>>Maret</option>
                    <option value="4" <?= ($bulanDipilih==4)?'selected':'' ?>>April</option>
                    <option value="5" <?= ($bulanDipilih==5)?'selected':'' ?>>Mei</option>
                    <option value="6" <?= ($bulanDipilih==6)?'selected':'' ?>>Juni</option>
                    <option value="7" <?= ($bulanDipilih==7)?'selected':'' ?>>Juli</option>
                    <option value="8" <?= ($bulanDipilih==8)?'selected':'' ?>>Agustus</option>
                    <option value="9" <?= ($bulanDipilih==9)?'selected':'' ?>>September</option>
                    <option value="10" <?= ($bulanDipilih==10)?'selected':'' ?>>Oktober</option>
                    <option value="11" <?= ($bulanDipilih==11)?'selected':'' ?>>November</option>
                    <option value="12" <?= ($bulanDipilih==12)?'selected':'' ?>>Desember</option>

                </select>

                <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    Tampilkan
                </button>

                <a href="<?= base_url('admin/export-laporan-2026?bulan='.($_GET['bulan'] ?? '')) ?>"
   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">

    <i class="fas fa-file-excel"></i>
    Export Excel

</a>

            </form>

        </div>

        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-xl font-semibold">

            Total Pendapatan :
            Rp <?= number_format($totalPendapatan,0,',','.') ?>

        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full border-collapse">

            <thead>

                <tr class="bg-gray-100">

                    <th class="px-6 py-4 text-left">Tanggal</th>
<th class="px-6 py-4 text-left">Pembeli</th>
<th class="px-6 py-4 text-left">Produk</th>
<th class="px-6 py-4 text-center">Qty</th>
<th class="px-6 py-4 text-right">Total</th>
<th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach($orders as $o): ?>

                <?php

                if($o['status'] != 'selesai'){
                    continue;
                }

                if($bulanDipilih != ''){

                    if(date('n', strtotime($o['created_at'])) != $bulanDipilih){
                        continue;
                    }

                    if(date('Y', strtotime($o['created_at'])) != 2026){
                        continue;
                    }
                }

                ?>

                <tr class="border-b hover:bg-indigo-50 transition">

    <td class="px-6 py-4">
        <?= date('d-m-Y', strtotime($o['created_at'])) ?>
    </td>

    <td class="px-6 py-4 font-medium">
        <?= $o['nama_pembeli'] ?>
    </td>

    <td class="px-6 py-4">
        <?= $o['nama_produk'] ?>
    </td>

    <td class="px-6 py-4 text-center">
        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs">
            <?= $o['jumlah'] ?>
        </span>
    </td>

    <td class="px-6 py-4 text-right font-semibold text-green-600">
        Rp <?= number_format($o['harga'] * $o['jumlah'],0,',','.') ?>
    </td>

    <td class="px-6 py-4 text-center">

       <button
onclick="openDetail(
'<?= $o['nama_pembeli'] ?>',
'<?= $o['nama_produk'] ?>',
'<?= $o['alamat'] ?>',
'<?= $o['metode_pembayaran'] ?>',
'<?= $o['jumlah'] ?>',
'Rp <?= number_format($o['harga'] * $o['jumlah'],0,',','.') ?>',
'<?= $o['nama_penerima'] ?? '-' ?>',
'<?= $o['catatan_pengiriman'] ?? '-' ?>',
'<?= $o['tanggal_kirim'] ?? '-' ?>',
'<?= $o['foto_bukti'] ?? '' ?>'
)"
class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl">
    <i class="fa fa-eye"></i> Detail
</button>

    </td>

</tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

</main>

<!-- MODAL DETAIL -->
<div id="detailModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl w-full max-w-4xl p-8 shadow-2xl max-h-[90vh] overflow-y-auto">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold text-indigo-600">
                Detail Pesanan & Pengiriman
            </h2>

            <button onclick="closeDetail()"
                    class="w-10 h-10 rounded-full hover:bg-gray-100">
                <i class="fa fa-times text-xl"></i>
            </button>

        </div>

        <!-- DATA PESANAN -->
        <div class="mb-6">

            <h3 class="font-bold text-gray-700 mb-4">
                Informasi Pesanan
            </h3>

            <div class="grid md:grid-cols-2 gap-4">

                <div class="bg-gray-50 p-4 rounded-xl">
                    <p class="text-xs text-gray-500">Pembeli</p>
                    <p id="dPembeli" class="font-semibold"></p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl">
                    <p class="text-xs text-gray-500">Produk</p>
                    <p id="dProduk" class="font-semibold"></p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl">
                    <p class="text-xs text-gray-500">Jumlah</p>
                    <p id="dQty" class="font-semibold"></p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl">
                    <p class="text-xs text-gray-500">Pembayaran</p>
                    <p id="dBayar" class="font-semibold"></p>
                </div>

            </div>

        </div>

        <!-- ALAMAT -->
        <div class="mb-6">

            <h3 class="font-bold text-gray-700 mb-2">
                Alamat Pengiriman
            </h3>

            <div id="dAlamat"
                 class="bg-gray-50 p-4 rounded-xl border">
            </div>

        </div>

        <!-- TOTAL -->
        <div class="mb-6">

            <h3 class="font-bold text-gray-700 mb-2">
                Total Pembayaran
            </h3>

            <div id="dTotal"
                 class="text-green-600 text-2xl font-bold">
            </div>

        </div>

        <!-- DATA KURIR -->
        <div class="border-t pt-6">

            <h3 class="font-bold text-indigo-600 text-lg mb-4">
                🚚 Data Pengiriman Kurir
            </h3>

            <div class="grid md:grid-cols-2 gap-4">

                <div class="bg-indigo-50 p-4 rounded-xl">
                    <p class="text-xs text-gray-500">
                        Nama Penerima
                    </p>

                    <p id="dPenerima"
                       class="font-semibold">
                    </p>
                </div>

                <div class="bg-indigo-50 p-4 rounded-xl">
                    <p class="text-xs text-gray-500">
                        Tanggal Pengiriman
                    </p>

                    <p id="dTanggal"
                       class="font-semibold">
                    </p>
                </div>

            </div>

            <div class="mt-4">

                <p class="text-xs text-gray-500 mb-2">
                    Catatan Pengiriman
                </p>

                <div id="dCatatan"
                     class="bg-gray-50 border p-4 rounded-xl">
                </div>

            </div>

            <div class="mt-5">

                <p class="text-xs text-gray-500 mb-2">
                    Bukti Pengiriman
                </p>

                <img id="dFoto"
                     src=""
                     class="rounded-2xl border shadow-lg w-full max-h-96 object-cover">

            </div>

        </div>

    </div>

</div>

<script>

function openDetail(
    pembeli,
    produk,
    alamat,
    bayar,
    qty,
    total,
    penerima,
    catatan,
    tanggal,
    foto
){

    document.getElementById('dPembeli').innerText = pembeli;
    document.getElementById('dProduk').innerText = produk;
    document.getElementById('dAlamat').innerText = alamat;
    document.getElementById('dBayar').innerText = bayar;
    document.getElementById('dQty').innerText = qty;
    document.getElementById('dTotal').innerText = total;

    document.getElementById('dPenerima').innerText = penerima;
    document.getElementById('dCatatan').innerText = catatan;
    document.getElementById('dTanggal').innerText = tanggal;

    if(foto != '')
    {
        document.getElementById('dFoto').src =
        "<?= base_url('uploads/bukti_pengiriman') ?>/" + foto;
    }

    document.getElementById('detailModal')
        .classList.remove('hidden');

    document.getElementById('detailModal')
        .classList.add('flex');
}

function closeDetail()
{
    document.getElementById('detailModal')
        .classList.add('hidden');

    document.getElementById('detailModal')
        .classList.remove('flex');
}
</script>

</body>
</html>