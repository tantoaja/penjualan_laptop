<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - LaptopStore</title>

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
                    <a href="<?= base_url('/') ?>" class="hover:text-indigo-600 transition duration-300">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('produk') ?>" class="hover:text-indigo-600 transition duration-300">
                        Produk
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('ulasan') ?>" class="hover:text-indigo-600 transition duration-300">
                        Ulasan
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('tentang') ?>" class="text-indigo-600 font-semibold">
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

    <section class="py-20 pt-32">

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-14 items-center">

            <div data-aos="fade-right" data-aos-duration="800">
                <img
                    src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1200&auto=format&fit=crop"
                    class="rounded-3xl shadow-2xl w-full object-cover h-[400px]"
                    alt="LaptopStore Team"
                >
            </div>

            <div data-aos="fade-left" data-aos-duration="800">

                <span class="bg-indigo-100 text-indigo-600 px-5 py-2 rounded-full text-sm font-semibold">
                    Toko Laptop Premium
                </span>

                <h2 class="text-4xl md:text-5xl font-bold mt-6 mb-6 leading-tight">
                    Solusi Teknologi<br>Modern Untuk Semua
                </h2>

                <p class="text-gray-600 leading-relaxed text-lg mb-6">
                    Kami menyediakan laptop original dengan kualitas terbaik,
                    garansi resmi, pelayanan profesional, dan harga kompetitif
                    untuk kebutuhan gaming, editing, bisnis, dan pendidikan.
                </p>

                <div class="grid grid-cols-2 gap-6 mt-10">

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-50">
                        <h3 class="text-4xl font-bold text-indigo-600">500+</h3>
                        <p class="text-gray-500 mt-2 font-medium">Produk Premium</p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-50">
                        <h3 class="text-4xl font-bold text-indigo-600">2K+</h3>
                        <p class="text-gray-500 mt-2 font-medium">Pelanggan Aktif</p>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="600">
                <h2 class="text-4xl font-bold mb-4">Informasi Toko</h2>
                <p class="text-gray-500 text-lg">Detail lengkap tentang LaptopStore</p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">

                <div class="bg-gray-50 p-10 rounded-3xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100" 
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="text-5xl mb-5">📍</div>
                    <h3 class="text-2xl font-bold mb-4">Lokasi</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Jl. Setia Budi No. 45,<br>
                        Medan Selayang, Kota Medan,<br>
                        Sumatera Utara
                    </p>
                </div>

                <div class="bg-gray-50 p-10 rounded-3xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100" 
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="text-5xl mb-5">⏰</div>
                    <h3 class="text-2xl font-bold mb-4">Jam Operasional</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Senin - Sabtu<br>
                        <span class="font-semibold text-indigo-600">09:00 - 21:00 WIB</span><br>
                        (Hari Minggu Libur)
                    </p>
                </div>

                <div class="bg-gray-50 p-10 rounded-3xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100" 
                     data-aos="fade-up" data-aos-delay="300">
                    <div class="text-5xl mb-5">📞</div>
                    <h3 class="text-2xl font-bold mb-4">Kontak</h3>
                    <p class="text-gray-600 leading-relaxed">
                        <strong>WhatsApp:</strong><br>
                        0812-3456-7890<br><br>
                        <strong>Email:</strong><br>
                        info@laptopstore.com
                    </p>
                </div>

            </div>

        </div>

    </section>

    <section class="py-20">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="600">
                <h2 class="text-4xl font-bold mb-4">Lokasi Kami</h2>
                <p class="text-gray-500 text-lg">Temukan toko LaptopStore di Medan Selayang</p>
            </div>

            <div class="rounded-3xl overflow-hidden shadow-2xl" data-aos="zoom-in" data-aos-duration="800">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.117173517175!2d98.64160417432655!3d3.560537453043818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fcfcd97d64b%3A0x63a8a30a213e4b3e!2sJl.%20Setia%20Budi%2C%20Kota%20Medan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid"
                    width="100%"
                    height="500"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>

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
                    <h3 class="text-xl font-semibold mb-4"> Navigasi </h3>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="/" class="hover:text-white">Beranda</a></li>
                        <li><a href="/produk" class="hover:text-white">Produk</a></li>
                        <li><a href="/ulasan" class="hover:text-white">Ulasan</a></li>
                        <li><a href="/tentang" class="hover:text-white">Tentang</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4"> Kontak </h3>
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

    
    <div id="registerModal" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-[999]">
        <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 p-6 text-white relative">
                <h2 class="text-3xl font-bold">Register Account</h2>
                <button onclick="closeRegisterModal()" class="absolute right-5 top-4 text-3xl hover:text-gray-200">×</button>
            </div>
            <div class="p-8">
                <form action="<?= base_url('register/save') ?>" method="POST" class="space-y-5">
                    <input type="text" name="nama" placeholder="Nama" class="w-full border p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <input type="email" name="email" placeholder="Email" class="w-full border p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <input type="password" name="password" placeholder="Password" class="w-full border p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button class="w-full bg-indigo-600 text-white py-3 rounded-xl hover:bg-indigo-700 transition font-semibold">
                        Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
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
            once: true, // Animasi hanya berjalan sekali saat di-scroll ke bawah
            offset: 100, // Trigger animasi sedikit lebih awal agar mulus
        });
    </script>

</body>
</html>