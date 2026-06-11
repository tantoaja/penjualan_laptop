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
$success = session()->getFlashdata('success');
$error   = session()->getFlashdata('error');
?>

<body class="bg-gray-100 text-gray-800 overflow-x-hidden">

<!-- NAVBAR -->
<nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-lg shadow-md z-50">

    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <!-- LOGO -->
        <div>
            <h1 class="text-2xl font-extrabold text-indigo-600">
                LaptopStore
            </h1>
        </div>

        <!-- MENU DESKTOP -->
        <ul class="hidden md:flex items-center gap-10 text-lg font-medium text-gray-700">
            <li><a href="/" class="hover:text-indigo-600">Beranda</a></li>
            <li><a href="<?= base_url('produk') ?>" class="hover:text-indigo-600">Produk</a></li>
            <li><a href="<?= base_url('ulasan') ?>" class="hover:text-indigo-600">Ulasan</a></li>
            <li><a href="<?= base_url('tentang') ?>" class="hover:text-indigo-600">Tentang</a></li>
        </ul>

        <!-- BUTTON AREA -->
        <div class="flex items-center gap-4">

            <!-- HAMBURGER MOBILE -->
            <button id="menuBtn" class="md:hidden text-2xl text-gray-700">
                <i class="fa-solid fa-bars"></i>
            </button>

            <?php if(session()->get('login')): ?>

                <a href="<?= base_url('profile') ?>"
                   class="hidden md:flex items-center gap-2 border border-indigo-600 text-indigo-600 px-5 py-2 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                    <i class="fa-solid fa-user"></i>
                    Profil Saya
                </a>

                <a href="<?= base_url('logout') ?>"
                   class="flex items-center gap-2 bg-red-500 text-white px-5 py-2 rounded-xl hover:bg-red-600 transition">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>

            <?php else: ?>

                <button onclick="openLoginModal()"
                    class="hidden md:block border border-indigo-600 text-indigo-600 px-5 py-2 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                    Login
                </button>

                <button onclick="openRegisterModal()"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-xl hover:bg-indigo-700 transition">
                    Daftar
                </button>

            <?php endif; ?>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden md:hidden bg-white px-6 pb-5 shadow-lg">

        <a href="/" class="block py-2">Beranda</a>
        <a href="<?= base_url('produk') ?>" class="block py-2">Produk</a>
        <a href="<?= base_url('ulasan') ?>" class="block py-2">Ulasan</a>
        <a href="<?= base_url('tentang') ?>" class="block py-2">Tentang</a>

        <hr class="my-3">

        <?php if(session()->get('login')): ?>
            <a href="<?= base_url('profile') ?>" class="block py-2">Profil</a>
            <a href="<?= base_url('logout') ?>" class="block py-2 text-red-500">Logout</a>
        <?php else: ?>
            <button onclick="openLoginModal()" class="block py-2 text-indigo-600">Login</button>
            <button onclick="openRegisterModal()" class="block py-2 text-indigo-600">Daftar</button>
        <?php endif; ?>

    </div>
</nav>

<!-- HERO (TETAP PUNYA ANDA) -->
<section class="min-h-screen pt-28 flex items-center bg-gradient-to-r from-indigo-700 via-blue-600 to-indigo-500 text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
        <div>
            <h1 class="text-4xl font-extrabold mb-6">
                Laptop Premium Untuk Masa Depan
            </h1>
        </div>
    </div>
</section>

<!-- MODAL LOGIN -->
<div id="loginModal" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-[999]">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl p-8">
        <form method="POST" action="<?= base_url('login/process') ?>">
            <input type="email" name="email" placeholder="Email" class="w-full border p-3 rounded-xl mb-3">
            <input type="password" name="password" placeholder="Password" class="w-full border p-3 rounded-xl mb-3">
            <button class="w-full bg-indigo-600 text-white py-3 rounded-xl">Login</button>
        </form>
    </div>
</div>

<!-- MODAL REGISTER -->
<div id="registerModal" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-[999]">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl p-8">
        <form method="POST" action="<?= base_url('register/save') ?>">
            <input type="text" name="nama" placeholder="Nama" class="w-full border p-3 rounded-xl mb-3">
            <input type="email" name="email" placeholder="Email" class="w-full border p-3 rounded-xl mb-3">
            <input type="password" name="password" placeholder="Password" class="w-full border p-3 rounded-xl mb-3">
            <button class="w-full bg-indigo-600 text-white py-3 rounded-xl">Daftar</button>
        </form>
    </div>
</div>

<!-- SCRIPT -->
<script>
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');

menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

function openLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
    document.getElementById('loginModal').classList.add('flex');
}

function closeLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
    document.getElementById('loginModal').classList.remove('flex');
}

function openRegisterModal() {
    document.getElementById('registerModal').classList.remove('hidden');
    document.getElementById('registerModal').classList.add('flex');
}

function closeRegisterModal() {
    document.getElementById('registerModal').classList.add('hidden');
    document.getElementById('registerModal').classList.remove('flex');
}
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init({
    once: true,
    offset: 120
});
</script>

</body>
</html>
