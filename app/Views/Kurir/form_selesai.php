<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Selesaikan Pengiriman</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    font-family:'Poppins',sans-serif;
}
</style>

</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="bg-indigo-600 p-6">
            <h2 class="text-2xl font-bold text-white">
                Bukti Pengiriman
            </h2>
            <p class="text-indigo-100">
                Lengkapi data sebelum menyelesaikan pesanan
            </p>
        </div>

        <form action="<?= base_url('kurir/prosesSelesai/'.$order['id']) ?>"
              method="post"
              enctype="multipart/form-data"
              class="p-8">

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="block mb-2 font-semibold">
                        Nama Penerima
                    </label>

                    <input type="text"
                           name="nama_penerima"
                           required
                           class="w-full border rounded-xl p-3">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">
                        No Telepon Penerima
                    </label>

                    <input type="text"
                           name="telepon_penerima"
                           class="w-full border rounded-xl p-3">
                </div>

            </div>

            <div class="mt-5">

                <label class="block mb-2 font-semibold">
                    Catatan Pengiriman
                </label>

                <textarea name="catatan_pengiriman"
                          rows="4"
                          class="w-full border rounded-xl p-3"
                          placeholder="Barang diterima dengan baik..."></textarea>

            </div>

            <div class="mt-5">

                <label class="block mb-2 font-semibold">
                    Upload Foto Bukti Pengiriman
                </label>

                <input type="file"
                       name="foto_bukti"
                       accept="image/*"
                       required
                       class="w-full border rounded-xl p-3">

            </div>

            <div class="bg-gray-50 rounded-2xl p-5 mt-6">

                <h3 class="font-bold mb-3">
                    Detail Pesanan
                </h3>

                <p><b>Pembeli :</b> <?= $order['nama_pembeli'] ?></p>
                <p><b>Produk :</b> <?= $order['nama_produk'] ?></p>
                <p><b>Alamat :</b> <?= $order['alamat'] ?></p>

            </div>

            <div class="flex gap-3 mt-8">

                <a href="<?= base_url('kurir') ?>"
                   class="px-5 py-3 bg-gray-200 rounded-xl">
                    Kembali
                </a>

                <button type="submit"
                        class="px-5 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700">
                    Simpan & Selesaikan Pesanan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>