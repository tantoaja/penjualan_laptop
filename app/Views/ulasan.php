<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Laptop</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body class="bg-gray-100 text-gray-800 overflow-x-hidden">

    <nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-lg shadow-md z-50">

        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

            <div>
                <h1 class="text-2xl font-extrabold text-indigo-600">
                    LaptopStore
                </h1>
            </div>

            <ul class="hidden md:flex items-center gap-10 text-lg font-medium text-gray-700">

                <li>
                    <a href="<?= base_url('/') ?>" class="hover:text-indigo-600">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('produk') ?>" class="hover:text-indigo-600">
                        Produk
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('ulasan') ?>" class="text-indigo-600 font-semibold">
                        Ulasan
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('tentang') ?>" class="hover:text-indigo-600">
                        Tentang
                    </a>
                </li>

            </ul>

            <div class="flex items-center gap-4">

                <?php if(session()->get('login')): ?>

                    <a href="<?= base_url('profile') ?>"
                       class="hidden md:flex items-center gap-2 border border-indigo-600 text-indigo-600 px-5 py-2 rounded-xl hover:bg-indigo-600 hover:text-white transition duration-300">
                        <i class="fa-solid fa-user"></i>
                        Profil Saya
                    </a>

                    <a href="<?= base_url('logout') ?>"
                       class="flex items-center gap-2 bg-red-500 text-white px-5 py-2 rounded-xl hover:bg-red-600 transition duration-300 shadow-lg">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>

                <?php else: ?>

                    <button
                        onclick="openLoginModal()"
                        class="hidden md:block border border-indigo-600 text-indigo-600 px-5 py-2 rounded-xl hover:bg-indigo-600 hover:text-white transition duration-300">
                        Login
                    </button>

                    <button
                        onclick="openRegisterModal()"
                        class="bg-indigo-600 text-white px-5 py-2 rounded-xl hover:bg-indigo-700 transition duration-300 shadow-lg">
                        Daftar
                    </button>

                <?php endif; ?>

            </div>

        </div>
        
    </nav>

    <section class="pb-5 pt-28 bg-white shadow-sm" data-aos="fade-down" data-aos-duration="700">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-3 gap-5">

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari produk..."
                    class="md:col-span-1 w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >

                <select
                    id="produkFilter"
                    class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                    <option value="">Semua Produk</option>
                    <?php foreach($produk as $p): ?>
                        <option value="<?= strtolower($p['nama']); ?>">
                            <?= $p['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <select
                    id="ratingFilter"
                    class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                    <option value="">Semua Rating</option>
                    <option value="5">⭐ 5 Bintang</option>
                    <option value="4">⭐ 4 Bintang</option>
                    <option value="3">⭐ 3 Bintang</option>
                    <option value="2">⭐ 2 Bintang</option>
                    <option value="1">⭐ 1 Bintang</option>
                </select>

            </div>

        </div>

    </section>

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">

            <?php foreach($ulasan as $u): ?>

            <div class="review-card bg-white rounded-3xl shadow-lg overflow-hidden hover:-translate-y-2 transition duration-300"
                 data-product="<?= strtolower($u['nama']); ?>"
                 data-rating="<?= $u['rating']; ?>"
                 data-aos="fade-up"
                 data-aos-duration="600">

                <div class="relative">
                    <img src="<?= base_url('assets/img/' . $u['gambar']) ?>" 
                         class="w-full h-52 object-cover"
                         onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">

                    <div class="absolute top-3 right-3 bg-indigo-600 text-white px-3 py-1 rounded-xl text-sm font-semibold">
                        ⭐ <?= $u['rating'] ?>
                    </div>
                </div>

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-1">
                        <?= $u['nama']; ?>
                    </h2>

                    <p class="text-indigo-600 font-semibold mb-2">
                        <?= $u['nama_user']; ?>
                    </p>

                    <div class="flex mb-3 text-yellow-400 text-lg">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <span><?= $i <= $u['rating'] ? '★' : '☆' ?></span>
                        <?php endfor; ?>
                    </div>

                    <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3">
                        <?= $u['komentar']; ?>
                    </p>

                    <p class="text-xs text-gray-400">
                        <?= date('d M Y', strtotime($u['tanggal'])); ?>
                    </p>

                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-3 gap-10">

                <div>
                    <h2 class="text-3xl font-bold text-indigo-400 mb-4">
                        LaptopStore
                    </h2>
                    <p class="text-gray-400 leading-relaxed">
                        Toko laptop modern dengan produk premium, kualitas terbaik, dan pelayanan terpercaya.
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">
                        Navigasi
                    </h3>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="/" class="hover:text-white">Beranda</a></li>
                        <li><a href="/produk" class="hover:text-white">Produk</a></li>
                        <li><a href="/ulasan" class="hover:text-white">Ulasan</a></li>
                        <li><a href="/tentang" class="hover:text-white">Tentang</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">
                        Kontak
                    </h3>
                    <p class="text-gray-400 mb-2">Email: info@laptopstore.com</p>
                    <p class="text-gray-400 mb-2">WhatsApp: 0812-3456-7890</p>
                    <p class="text-gray-400">Medan, Indonesia</p>
                </div>

            </div>

            <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
                © 2026 LaptopStore. All Rights Reserved.
            </div>

        </div>

    </footer>

    <script>
        // FILTER ULASAN
        const searchInput = document.getElementById('searchInput');
        const produkFilter = document.getElementById('produkFilter');
        const ratingFilter = document.getElementById('ratingFilter');
        const cards = document.querySelectorAll('.review-card');

        function filterReviews() {
            const searchValue = searchInput.value.toLowerCase();
            const produkValue = produkFilter.value;
            const ratingValue = ratingFilter.value;

            cards.forEach(card => {
                const product = card.dataset.product;
                const rating = card.dataset.rating;

                const matchSearch = product.includes(searchValue);
                const matchProduk = produkValue === "" || product === produkValue;
                const matchRating = ratingValue === "" || rating === ratingValue;

                if(matchSearch && matchProduk && matchRating) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }

        searchInput.addEventListener('keyup', filterReviews);
        produkFilter.addEventListener('change', filterReviews);
        ratingFilter.addEventListener('change', filterReviews);

        // MODAL TOGGLE FUNCTIONS
        function openLoginModal() {
            document.getElementById('loginModal').classList.add('flex');
            document.getElementById('loginModal').classList.remove('hidden');
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('loginModal').classList.remove('flex');
        }

        function openRegisterModal() {
            document.getElementById('registerModal').classList.add('flex');
            document.getElementById('registerModal').classList.remove('hidden');
        }

        function closeRegisterModal() {
            document.getElementById('registerModal').classList.add('hidden');
            document.getElementById('registerModal').classList.remove('flex');
        }
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // Animasi hanya berjalan 1 kali saat di-scroll ke bawah
            offset: 120, // Memulai animasi 120px sebelum elemen terlihat di layar
        });
    </script>

</body>
</html>