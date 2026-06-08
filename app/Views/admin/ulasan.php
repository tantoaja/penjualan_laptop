<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Ulasan</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { font-family: 'Poppins', sans-serif; }
</style>
</head>

<body class="bg-gray-100 flex">

<!-- ================= SIDEBAR (SAMA PERSIS DASHBOARD) ================= -->
<aside class="w-72 bg-white shadow-lg h-screen fixed left-0 top-0 p-6">

    <div class="flex items-center gap-3 mb-10">
        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">
            LS
        </div>
        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
    </div>

    <!-- ================= SIDEBAR ================= -->
<aside class="w-72 bg-white shadow-lg h-screen fixed left-0 top-0 p-6">

    <!-- LOGO -->
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
           <?= ($uri->getSegment(2) == 'orders') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
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
</aside>

<!-- ================= MAIN CONTENT ================= -->
<main class="ml-72 w-full p-10">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Manajemen Ulasan</h2>
        <p class="text-gray-500">Kelola review pelanggan laptop store</p>
    </div>

    <!-- FILTER CARD (SAMA STYLE DASHBOARD) -->
    <div class="bg-white rounded-3xl shadow p-6 mb-8">

        <form method="GET" class="grid md:grid-cols-4 gap-4">

            <input type="text"
                   name="keyword"
                   placeholder="Cari user / komentar"
                   class="border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500">

            <select name="produk" class="border rounded-xl p-3">
                <option value="">Semua Produk</option>
                <?php foreach($produkList as $p): ?>
                    <option value="<?= $p['id_produk'] ?>">
                        <?= $p['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="rating" class="border rounded-xl p-3">
                <option value="">Semua Rating</option>
                <option value="5">⭐ 5</option>
                <option value="4">⭐ 4</option>
                <option value="3">⭐ 3</option>
                <option value="2">⭐ 2</option>
                <option value="1">⭐ 1</option>
            </select>

            <button class="bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                <i class="fa fa-search"></i> Filter
            </button>

        </form>

    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-3xl shadow p-6">

        <div class="flex justify-between items-center mb-5">

    <h3 class="text-lg font-bold">Data Ulasan</h3>

    <a href="<?= base_url('admin/ulasan/export-rating-terbaik') ?>"
       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl">
        <i class="fas fa-file-excel"></i>
        Export Excel
    </a>

</div>

        <div class="space-y-4">

            <?php foreach($ulasan as $u): ?>

            <div class="flex justify-between items-center bg-gray-50 p-4 rounded-2xl">

                <div>

                    <p class="font-semibold text-gray-800">
                        <?= esc($u['nama_user']) ?>
                    </p>

                    <p class="text-sm text-gray-500">
                        <?= esc($u['komentar']) ?>
                    </p>

                    <p class="text-yellow-500 text-sm">
                        ⭐ <?= $u['rating'] ?>/5
                    </p>

                </div>

                <div class="text-right">

                    <span class="text-xs text-gray-400 block mb-2">
                        Produk ID: <?= $u['id_produk'] ?>
                    </span>

                    <a href="<?= base_url('admin/ulasan/delete/'.$u['id_ulasan']) ?>"
   onclick="return confirm('Yakin ingin menghapus ulasan ini?')"
   class="text-red-500 hover:text-red-700 text-sm">
    Hapus
</a>

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>

</main>

</body>
</html>