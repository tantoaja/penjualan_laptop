<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LaptopStore</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<?php
// Amankan pemanggilan flashdata agar tidak memicu error getController jika session belum siap
$success = isset($session) ? session()->getFlashdata('success') : (function_exists('session') ? session()->getFlashdata('success') : null);
$error   = isset($session) ? session()->getFlashdata('error') : (function_exists('session') ? session()->getFlashdata('error') : null);
$isLogin = (function_exists('session') && session()->get('login')) ? true : false;
?>
<body class="bg-gray-100 text-gray-800 overflow-x-hidden">

<nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-lg shadow-md z-50">
 
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <div>
            <h1 class="text-2xl font-extrabold text-indigo-600">
                LaptopStore
            </h1>
        </div>
        
        <ul class="hidden md:flex items-center gap-10 text-lg font-medium text-gray-700">
            <li><a href="/" class="hover:text-indigo-600 transition duration-300">Beranda</a></li>
            <li><a href="<?= base_url('produk') ?>" class="hover:text-indigo-600">Produk</a></li>
            <li><a href="<?= base_url('ulasan') ?>" class="hover:text-indigo-600">Ulasan</a></li>
            <li><a href="<?= base_url('tentang') ?>" class="hover:text-indigo-600">Tentang</a></li>
        </ul>

        <div class="flex items-center gap-4">

            <div class="hidden md:flex items-center gap-4">
                <?php if($isLogin): ?>

                    <a href="<?= base_url('profile') ?>"
                       class="flex items-center gap-2 border border-indigo-600 text-indigo-600 px-5 py-2 rounded-xl hover:bg-indigo-600 hover:text-white transition duration-300">
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
                        class="border border-indigo-600 text-indigo-600 px-5 py-2 rounded-xl hover:bg-indigo-600 hover:text-white transition duration-300">
                        Login
                    </button>

                    <button
                        onclick="openRegisterModal()"
                        class="bg-indigo-600 text-white px-5 py-2 rounded-xl hover:bg-indigo-700 transition duration-300 shadow-lg">
                        Daftar
                    </button>

                <?php endif; ?>
            </div>

            <button onclick="toggleMobileMenu()" class="block md:hidden text-gray-700 text-2xl focus:outline-none">
                <i id="hamburgerIcon" class="fa-solid fa-bars"></i>
            </button>

        </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-inner px-6 py-4 space-y-4">
        <ul class="flex flex-col gap-4 text-lg font-medium text-gray-700">
            <li><a href="/" class="hover:text-indigo-600 block py-1">Beranda</a></li>
            <li><a href="<?= base_url('produk') ?>" class="hover:text-indigo-600 block py-1">Produk</a></li>
            <li><a href="<?= base_url('ulasan') ?>" class="hover:text-indigo-600 block py-1">Ulasan</a></li>
            <li><a href="<?= base_url('tentang') ?>" class="hover:text-indigo-600 block py-1">Tentang</a></li>
        </ul>
        
        <hr class="border-gray-200 my-2">
        
        <div class="flex flex-col gap-3 pt-2">
            <?php if($isLogin): ?>

                <a href="<?= base_url('profile') ?>"
                   class="flex items-center justify-center gap-2 border border-indigo-600 text-indigo-600 px-5 py-3 rounded-xl hover:bg-indigo-600 hover:text-white transition duration-300">
                    <i class="fa-solid fa-user"></i>
                    Profil Saya
                </a>

                <a href="<?= base_url('logout') ?>"
                   class="flex items-center justify-center gap-2 bg-red-500 text-white px-5 py-3 rounded-xl hover:bg-red-600 transition duration-300 shadow-lg">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>

            <?php else: ?>

                <button
                    onclick="openLoginModal(); toggleMobileMenu();"
                    class="w-full border border-indigo-600 text-indigo-600 px-5 py-3 rounded-xl hover:bg-indigo-600 hover:text-white transition duration-300">
                    Login
                </button>

                <button
                    onclick="openRegisterModal(); toggleMobileMenu();"
                    class="w-full bg-indigo-600 text-white px-5 py-3 rounded-xl hover:bg-indigo-700 transition duration-300 shadow-lg">
                    Daftar
                </button>

            <?php endif; ?>
        </div>
    </div>
</nav>

<section class="min-h-screen pt-28 flex items-center bg-gradient-to-r from-indigo-700 via-blue-600 to-indigo-500 text-white overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

        <div data-aos="fade-right" data-aos-duration="1000">

            <div class="mb-6">
                <span class="bg-white/20 px-5 py-2 rounded-full text-sm font-medium backdrop-blur-md">
                    ✨ Teknologi Modern 2026
                </span>
            </div>

            <h1 class="text-4xl font-extrabold leading-tight mb-8">
                Laptop Premium<br>
                Untuk Masa
                Depan Digital
                Anda
            </h1>

            <p class="text-lg md:text-xl text-gray-200 mb-10">
                Temukan laptop gaming, editing, office, dan produktivitas terbaik dengan desain modern, performa tinggi, dan harga terbaik.
            </p>

            <div class="flex flex-wrap gap-5 mb-12">
                <a href=""
                   class="bg-white text-indigo-700 px-8 py-4 rounded-2xl font-semibold hover:bg-gray-200 transition shadow-2xl">
                    Lihat Produk
                </a>

                <a href=""
                   class="border border-white px-8 py-4 rounded-2xl hover:bg-white hover:text-indigo-700 transition">
                    Pelajari Lagi
                </a>
            </div>

            <div class="flex flex-wrap gap-10">
                <div>
                    <h2 class="text-4xl font-bold">500+</h2>
                    <p class="text-gray-200">Produk Premium</p>
                </div>

                <div>
                    <h2 class="text-4xl font-bold">2K+</h2>
                    <p class="text-gray-200">Customer Aktif</p>
                </div>

                <div>
                    <h2 class="text-4xl font-bold">4.9</h2>
                    <p class="text-gray-200">Rating Tertinggi</p>
                </div>
            </div>

        </div>

        <div class="relative flex justify-center" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">

            <div class="absolute w-96 h-96 bg-white/20 rounded-full blur-3xl"></div>

            <img src="<?= base_url('assets/img/bg-laptop.png') ?>"
                 alt="Laptop"
                 class="relative rounded-3xl  max-w-xl hover:scale-105 transition">

        </div>
    </div>
</section>

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-5xl font-bold mb-4">Kenapa Memilih Kami?</h2>
            <p class="text-gray-500 text-lg">Pengalaman belanja laptop premium terbaik</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-gray-50 p-10 rounded-3xl shadow-lg hover:-translate-y-3 transition" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <div class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center text-4xl mb-6">💻</div>
                <h3 class="text-2xl font-bold mb-4">Produk Original</h3>
                <p class="text-gray-600">Semua produk laptop original dan bergaransi resmi.</p>
            </div>

            <div class="bg-gray-50 p-10 rounded-3xl shadow-lg hover:-translate-y-3 transition" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center text-4xl mb-6">⚡</div>
                <h3 class="text-2xl font-bold mb-4">Pengiriman Cepat</h3>
                <p class="text-gray-600">Aman dan cepat ke seluruh Indonesia.</p>
            </div>

            <div class="bg-gray-50 p-10 rounded-3xl shadow-lg hover:-translate-y-3 transition" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center text-4xl mb-6">⭐</div>
                <h3 class="text-2xl font-bold mb-4">Rating Terbaik</h3>
                <p class="text-gray-600">Ribuan customer puas dengan layanan kami.</p>
            </div>

        </div>

    </div>
</section>

<section class="py-24 bg-gradient-to-r from-indigo-700 to-blue-600 text-white text-center overflow-hidden">

    <div class="max-w-5xl mx-auto px-6" data-aos="zoom-in" data-aos-duration="1000">

        <h2 class="text-5xl font-bold mb-6">
            Tingkatkan Produktivitas Dengan Laptop Modern
        </h2>

        <p class="text-lg text-gray-200 mb-10">
            Gaming, editing, bisnis, dan pendidikan dalam satu perangkat.
        </p>

        <a href="/produk"
           class="bg-white text-indigo-700 px-10 py-4 rounded-2xl font-semibold shadow-xl hover:bg-gray-200">
            Mulai Belanja
        </a>

    </div>
</section>

<footer class="bg-gray-900 text-white py-12">

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10" data-aos="fade-up" data-aos-duration="800" data-aos-trigger-position="bottom font">

        <div>
            <h2 class="text-3xl font-bold text-indigo-400 mb-4">LaptopStore</h2>
            <p class="text-gray-400">Toko laptop premium terpercaya.</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Navigasi</h3>
            <ul class="space-y-3 text-gray-400">
                <li><a href="/" class="hover:text-white">Beranda</a></li>
                <li><a href="/produk" class="hover:text-white">Produk</a></li>
                <li><a href="/ulasan" class="hover:text-white">Ulasan</a></li>
                <li><a href="/tentang" class="hover:text-white">Tentang</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Kontak</h3>
            <p class="text-gray-400">Email: info@laptopstore.com</p>
            <p class="text-gray-400">WhatsApp: 0812-3456-7890</p>
            <p class="text-gray-400">Medan, Indonesia</p>
        </div>

    </div>

    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
        © 2026 LaptopStore. All Rights Reserved.
    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if($success): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: "<?= esc($success) ?>",
    confirmButtonColor: '#4f46e5'
});
</script>
<?php endif; ?>

<?php if($error): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: "<?= esc($error) ?>",
    confirmButtonColor: '#ef4444'
});
</script>
<?php endif; ?>

<div id="loginModal" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-[999]">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl">
        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 p-6 text-white relative">
            <h2 class="text-3xl font-bold">Login Account</h2>
            <button onclick="closeLoginModal()" class="absolute right-5 top-4 text-3xl">×</button>
        </div>
        <div class="p-8">
            <form action="<?= base_url('login/process') ?>" method="POST" class="space-y-5">
                <input type="email" name="email" placeholder="Email" class="w-full border p-3 rounded-xl" required>
                <input type="password" name="password" placeholder="Password" class="w-full border p-3 rounded-xl" required>
                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-xl">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>

<div id="registerModal" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-[999]">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl">
        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 p-6 text-white relative">
            <h2 class="text-3xl font-bold">Register Account</h2>
            <button onclick="closeRegisterModal()" class="absolute right-5 top-4 text-3xl">×</button>
        </div>
        <div class="p-8">
            <form action="<?= base_url('register/save') ?>" method="POST" class="space-y-5">
                <input type="text" name="nama" placeholder="Nama" class="w-full border p-3 rounded-xl" required>
                <input type="email" name="email" placeholder="Email" class="w-full border p-3 rounded-xl" required>
                <input type="password" name="password" placeholder="Password" class="w-full border p-3 rounded-xl" required>
                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-xl">
                    Daftar
                </button>
            </form>
        </div>
    </div>
</div>

<script>
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

function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    const hamburgerIcon = document.getElementById('hamburgerIcon');
    
    if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.remove('hidden');
        hamburgerIcon.classList.remove('fa-bars');
        hamburgerIcon.classList.add('fa-xmark');
    } else {
        mobileMenu.classList.add('hidden');
        hamburgerIcon.classList.remove('fa-xmark');
        hamburgerIcon.classList.add('fa-bars');
    }
}
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, 
        offset: 120, 
    });
</script>

</body>
</html>
