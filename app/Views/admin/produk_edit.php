<!DOCTYPE html>
<html>
<head>
<title>Edit Produk</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow">

    <h2 class="text-xl font-bold mb-5">Edit Produk</h2>

    <form action="<?= base_url('admin/produk/update/'.$produk['id_produk']) ?>" method="POST" class="space-y-4">

        <input name="nama" value="<?= $produk['nama'] ?>" class="w-full border p-3 rounded-xl">
        <input name="merek" value="<?= $produk['merek'] ?>" class="w-full border p-3 rounded-xl">
        <input name="harga" value="<?= $produk['harga'] ?>" class="w-full border p-3 rounded-xl">
        <input name="kategori" value="<?= $produk['kategori'] ?>" class="w-full border p-3 rounded-xl">
        <input name="gambar" value="<?= $produk['gambar'] ?>" class="w-full border p-3 rounded-xl">

        <textarea name="deskripsi" class="w-full border p-3 rounded-xl"><?= $produk['deskripsi'] ?></textarea>

        <button class="bg-indigo-600 text-white w-full py-3 rounded-xl">
            Update Produk
        </button>

    </form>

</div>

</body>
</html>