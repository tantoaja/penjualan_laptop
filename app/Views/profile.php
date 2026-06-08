<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User - LaptopStore</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100">

<!-- ================= NAVBAR ================= -->
<nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-lg shadow-md z-50">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <h1 class="text-2xl font-extrabold text-indigo-600">
            LaptopStore
        </h1>

        <ul class="hidden md:flex items-center gap-10 text-lg font-medium text-gray-700">
            <li><a href="<?= base_url('/') ?>" class="hover:text-indigo-600">Beranda</a></li>
            <li><a href="<?= base_url('produk') ?>" class="hover:text-indigo-600">Produk</a></li>
            <li><a href="<?= base_url('ulasan') ?>" class="hover:text-indigo-600">Ulasan</a></li>
            <li><a href="<?= base_url('tentang') ?>" class="hover:text-indigo-600">Tentang</a></li>
        </ul>

        <div class="flex items-center gap-4">

            <?php if(session()->get('login')): ?>

                

                <a href="<?= base_url('logout') ?>"
                   class="flex items-center gap-2 bg-red-500 text-white px-5 py-2 rounded-xl hover:bg-red-600 transition">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>

            <?php endif; ?>

        </div>
    </div>
</nav>

<!-- ================= CONTENT ================= -->
<div class="max-w-7xl mx-auto px-6 pt-28 grid md:grid-cols-3 gap-6">

    <!-- PROFILE CARD -->
    <div class="bg-white rounded-3xl shadow-lg p-6">

        <div class="text-center">

            <div class="w-24 h-24 mx-auto rounded-full bg-indigo-600 flex items-center justify-center text-white text-3xl font-bold">
                <?= strtoupper(substr(session()->get('nama'),0,1)) ?>
            </div>

            <h2 class="mt-4 text-xl font-bold">
                <?= session()->get('nama') ?>
            </h2>

            <p class="text-gray-500">
                <?= session()->get('email') ?>
            </p>

        </div>

        <hr class="my-5">

        <div class="space-y-2 text-sm text-gray-600">
            <p><b>Role:</b> User</p>
            <p><b>Status:</b> Aktif</p>
            <p><b>Bergabung:</b> 2026</p>
        </div>

    </div>

    <!-- RIWAYAT PEMESANAN -->
    <div class="md:col-span-2 bg-white rounded-3xl shadow-lg p-6">

        <h2 class="text-xl font-bold mb-4">Riwayat Pemesanan</h2>

        <?php if (empty($orders)): ?>

            <p class="text-gray-500">Belum ada pemesanan.</p>

        <?php else: ?>

            <div class="space-y-4">

                <?php foreach ($orders as $o): ?>

                    <div class="border rounded-2xl p-4 flex justify-between items-center">

    <div>

        <h3 class="font-bold text-indigo-600">
            <?= esc($o['nama_produk'] ?? '-') ?>
        </h3>

        <p class="text-sm text-gray-500">
            Jumlah: <?= esc($o['jumlah'] ?? 0) ?> |
            Rp <?= number_format(($o['harga'] ?? 0) * ($o['jumlah'] ?? 0), 0, ',', '.') ?>
        </p>

        <p class="text-xs text-gray-400">
            <?= date('d M Y', strtotime($o['created_at'] ?? 'now')) ?>
        </p>

    </div>

    <div class="flex flex-col items-end gap-2">

        <!-- STATUS -->
        <span class="px-4 py-1 rounded-xl text-sm
            <?= (($o['status'] ?? 'pending') == 'selesai')
                ? 'bg-green-100 text-green-600'
                : 'bg-yellow-100 text-yellow-600' ?>">

            <?= esc($o['status'] ?? 'pending') ?>

        </span>

        

        <!-- TOMBOL CANCEL -->
        <?php if(($o['status'] ?? '') == 'pending'): ?>

            <a href="<?= base_url('order/cancel/'.$o['id']) ?>"
               onclick="return confirm('Yakin ingin membatalkan pesanan ini?')"
               class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm transition">

                Cancel Pesanan
            </a>

        <?php endif; ?>

    </div>

</div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</div>





</body>
</html>