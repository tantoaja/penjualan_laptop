<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { font-family: 'Poppins', sans-serif; }
</style>
</head>

<body class="bg-gray-100 flex">

<!-- ================= SIDEBAR ================= -->
<aside class="w-72 bg-white shadow-lg h-screen fixed left-0 top-0 p-6">

    <!-- LOGO -->
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
        <h2 class="text-3xl font-bold text-gray-800">Dashboard Overview</h2>
        <p class="text-gray-500">Welcome back, Admin 👋</p>
    </div>

    <!-- STATS -->
    <div class="grid md:grid-cols-3 gap-6 mb-10">

        <div class="bg-white rounded-3xl shadow p-6 hover:shadow-xl transition">
            <p class="text-gray-500">Total Produk</p>
            <h3 class="text-2xl font-bold text-indigo-600"><?= $totalProduk ?></h3>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 hover:shadow-xl transition">
            <p class="text-gray-500">Total Pesanan</p>
            <h3 class="text-2xl font-bold text-green-600"><?= $totalPesanan ?></h3>
        </div>

        <!-- CLICKABLE CARD -->
        <a href="<?= base_url('admin/ulasan') ?>"
           class="bg-white rounded-3xl shadow p-6 hover:shadow-xl transition block">

            <p class="text-gray-500">Total Ulasan</p>
            <h3 class="text-2xl font-bold text-yellow-500"><?= $totalUlasan ?></h3>

        </a>

    </div>

    <!-- RECENT -->
    <div class="grid md:grid-cols-2 gap-6">

        <!-- ORDERS -->
        <div class="bg-white rounded-3xl shadow p-6">
            <h3 class="text-lg font-bold mb-4">Recent Orders</h3>

            <?php foreach($recentOrders as $o): ?>

            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-xl mb-2">

                <div>
                    <p class="font-semibold"><?= $o['nama_produk'] ?></p>
                    <p class="text-xs text-gray-500">
                        <?= date('d M Y', strtotime($o['created_at'])) ?>
                    </p>
                </div>

                <span class="text-xs px-3 py-1 rounded-full
                    <?= $o['status']=='success'
                        ? 'bg-green-100 text-green-600'
                        : 'bg-yellow-100 text-yellow-600' ?>">
                    <?= $o['status'] ?>
                </span>

            </div>

            <?php endforeach; ?>
        </div>

        <!-- ULASAN -->
        <div class="bg-white rounded-3xl shadow p-6">
            <h3 class="text-lg font-bold mb-4">Recent Reviews</h3>

            <?php foreach($recentUlasan as $u): ?>

            <div class="p-3 bg-gray-50 rounded-xl mb-2">

                <p class="font-semibold"><?= $u['nama_user'] ?></p>
                <p class="text-sm text-gray-500"><?= $u['komentar'] ?></p>
                <p class="text-yellow-500 text-sm">⭐ <?= $u['rating'] ?>/5</p>

            </div>

            <?php endforeach; ?>

        </div>

    </div>

</main>

</body>
</html>