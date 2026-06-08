<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Produk</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { font-family: 'Poppins', sans-serif; }
</style>
</head>

<body class="bg-gray-100 flex">

<!-- ================= SIDEBAR (SAMA PERSIS DASHBOARD) ================= -->
<aside class="w-72 bg-white shadow-lg h-screen fixed left-0 top-0 p-6">

    <!-- LOGO -->
    <div class="flex items-center gap-3 mb-10">
        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">
            LS
        </div>
        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
    </div>

    <?php $uri = service('uri'); ?>

    <nav class="space-y-3">

        <a href="<?= base_url('admin') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == '') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-home"></i> Dashboard
        </a>

        <a href="<?= base_url('admin/profile') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == 'profile') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-user"></i> Profile
        </a>

        <a href="<?= base_url('admin/order') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == 'order') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-shopping-cart"></i> Pesanan
        </a>

        <!-- PRODUK ACTIVE -->
        <a href="<?= base_url('admin/produk') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == 'produk') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-laptop"></i> Produk
        </a>

        <a href="<?= base_url('admin/ulasan') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition
           <?= ($uri->getSegment(2) == 'ulasan') ? 'bg-indigo-100 text-indigo-600' : 'text-gray-700 hover:bg-gray-100' ?>">
            <i class="fa fa-star"></i> Ulasan
        </a>

        <a href="<?= base_url('logout') ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 mt-10">
            <i class="fa fa-sign-out"></i> Logout
        </a>

    </nav>
</aside>

<!-- ================= MAIN CONTENT ================= -->
<main class="ml-72 w-full p-10">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Manajemen Produk</h2>
        <p class="text-gray-500">CRUD produk laptop store</p>
    </div>

    <!-- FORM CREATE -->
    <div class="bg-white rounded-3xl shadow p-6 mb-8">

        <h3 class="text-lg font-bold mb-4">Tambah Produk</h3>

        <form action="<?= base_url('admin/produk/create') ?>" method="POST"
              class="grid md:grid-cols-2 gap-4">

            <input name="nama" placeholder="Nama Produk"
                   class="border rounded-xl p-3">

            <input name="merek" placeholder="Merek"
                   class="border rounded-xl p-3">

            <input name="harga" placeholder="Harga"
                   class="border rounded-xl p-3">

            <input name="kategori" placeholder="Kategori"
                   class="border rounded-xl p-3">

            <input name="gambar" placeholder="Nama Gambar"
                   class="border rounded-xl p-3 md:col-span-2">

            <textarea name="deskripsi" placeholder="Deskripsi"
                      class="border rounded-xl p-3 md:col-span-2"></textarea>

            <button class="bg-indigo-600 text-white py-3 rounded-xl md:col-span-2 hover:bg-indigo-700">
                Simpan Produk
            </button>

        </form>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full text-sm text-left">

            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4">Nama</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach($produk as $p): ?>

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4 font-semibold"><?= $p['nama'] ?></td>
                    <td><?= $p['merek'] ?></td>
                    <td>Rp <?= number_format($p['harga']) ?></td>
                    <td>
                        <span class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-full">
                            <?= $p['kategori'] ?>
                        </span>
                    </td>

                    <td class="flex gap-2 p-3">

                        <a href="<?= base_url('admin/produk/edit/'.$p['id_produk']) ?>"
   class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-xs">
    Edit
</a>

<a href="<?= base_url('admin/produk/delete/'.$p['id_produk']) ?>"
   class="bg-red-500 text-white px-3 py-1 rounded-lg text-xs">
    Hapus
</a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>