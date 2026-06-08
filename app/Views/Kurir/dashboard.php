<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kurir Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { font-family: 'Poppins', sans-serif; }
</style>
</head>

<body class="bg-gray-100 flex">

<!-- ================= SIDEBAR ================= -->
<aside class="w-72 bg-white shadow-lg h-screen fixed left-0 top-0 p-6">

    <div class="flex items-center gap-3 mb-10">
        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">
            KR
        </div>
        <h1 class="text-xl font-bold text-gray-800">Kurir Panel</h1>
    </div>

    <nav class="space-y-3">

        <a href="<?= base_url('kurir') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600">
            <i class="fa fa-truck"></i> Pesanan Dikirim
        </a>

        <a href="<?= base_url('logout') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 mt-10">
            <i class="fa fa-sign-out"></i> Logout
        </a>

    </nav>

</aside>

<!-- ================= MAIN ================= -->
<main class="ml-72 w-full p-10">

    <h2 class="text-3xl font-bold text-gray-800 mb-2">Pesanan Kurir</h2>
    <p class="text-gray-500 mb-8">Kelola pengiriman barang</p>

    <!-- ================= PESANAN SHIPPING ================= -->
    <h3 class="text-xl font-bold mb-4 text-indigo-600">
        🚚 Dalam Pengiriman
    </h3>

    <div class="grid md:grid-cols-2 gap-6">

        <?php 
        $adaShipping = false;

        foreach($orders as $o):
            if(strtolower($o['status']) == 'shipping'):
                $adaShipping = true;
        ?>

        <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl transition">

            <div class="flex justify-between mb-2">
                <h2 class="font-bold"><?= $o['nama_pembeli'] ?></h2>
                <span class="bg-yellow-100 text-yellow-600 text-xs px-3 py-1 rounded-full">
                    Shipping
                </span>
            </div>

            <p class="text-gray-600"><?= $o['nama_produk'] ?></p>

            <div class="text-sm text-gray-500 mt-3">
                <p>📍 <?= $o['alamat'] ?></p>
                <p>💳 <?= $o['metode_pembayaran'] ?></p>
            </div>

            <a href="<?= base_url('kurir/formSelesai/'.$o['id']) ?>"
   class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition">
    ✔ Tandai Selesai
</a>

        </div>

        <?php 
            endif;
        endforeach; 
        ?>

        <?php if(!$adaShipping): ?>
            <p class="text-gray-500">Tidak ada pesanan yang sedang dikirim.</p>
        <?php endif; ?>

    </div>

</main>

</body>
</html>