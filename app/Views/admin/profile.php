<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Profile</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { font-family: 'Poppins', sans-serif; }
</style>
</head>

<body class="bg-gray-100">

<!-- TOP NAV -->
<div class="bg-white shadow-md px-6 py-4 flex justify-between items-center">

    <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">
            LS
        </div>
        <h1 class="text-lg font-bold text-gray-800">Admin Dashboard</h1>
    </div>

    <a href="<?= base_url('admin') ?>"
       class="text-sm text-gray-600 hover:text-indigo-600 flex items-center gap-2">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

</div>

<!-- CONTENT -->
<div class="max-w-6xl mx-auto mt-10 grid md:grid-cols-3 gap-6 px-4">

    <!-- LEFT CARD -->
    <div class="bg-white rounded-3xl shadow-lg p-6 text-center hover:shadow-2xl transition">

        <!-- AVATAR -->
        <div class="w-28 h-28 mx-auto bg-gradient-to-r from-indigo-500 to-blue-500 rounded-full flex items-center justify-center text-white text-4xl font-bold shadow-lg">
            <?= strtoupper(substr($nama,0,1)) ?>
        </div>

        <h2 class="mt-4 text-xl font-bold text-gray-800"><?= $nama ?></h2>
        <p class="text-gray-500"><?= $email ?></p>

        <!-- ROLE BADGE -->
        <div class="mt-4">
            <span class="px-4 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-medium">
                <?= strtoupper($role) ?>
            </span>
        </div>

        <!-- STATUS -->
        <div class="mt-5 flex justify-center">
            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                Active Admin
            </span>
        </div>

    </div>

    <!-- RIGHT CONTENT -->
    <div class="md:col-span-2 space-y-6">

        <!-- INFO CARD -->
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-4">
                <i class="fa fa-user-gear text-indigo-600"></i> Admin Information
            </h2>

            <div class="grid md:grid-cols-2 gap-4 text-sm">

                <div class="p-4 bg-gray-50 rounded-2xl">
                    <p class="text-gray-500">Nama</p>
                    <p class="font-bold text-gray-800"><?= $nama ?></p>
                </div>

                <div class="p-4 bg-gray-50 rounded-2xl">
                    <p class="text-gray-500">Email</p>
                    <p class="font-bold text-gray-800"><?= $email ?></p>
                </div>

                <div class="p-4 bg-gray-50 rounded-2xl">
                    <p class="text-gray-500">Role</p>
                    <p class="font-bold text-indigo-600"><?= $role ?></p>
                </div>

                <div class="p-4 bg-gray-50 rounded-2xl">
                    <p class="text-gray-500">Access Level</p>
                    <p class="font-bold text-gray-800">Full Control</p>
                </div>

            </div>

        </div>

        <!-- STATS CARD -->
        <div class="grid md:grid-cols-3 gap-4">

            <div class="bg-white p-5 rounded-2xl shadow hover:scale-105 transition">
                <p class="text-gray-500 text-sm">System Role</p>
                <h3 class="text-xl font-bold text-indigo-600">Administrator</h3>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow hover:scale-105 transition">
                <p class="text-gray-500 text-sm">Status</p>
                <h3 class="text-xl font-bold text-green-600">Active</h3>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow hover:scale-105 transition">
                <p class="text-gray-500 text-sm">Access</p>
                <h3 class="text-xl font-bold text-gray-800">Full</h3>
            </div>

        </div>

        <!-- SECURITY NOTICE -->
        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white p-6 rounded-3xl shadow-lg">

            <h2 class="text-lg font-bold mb-2">
                <i class="fa fa-shield-alt"></i> Security Notice
            </h2>

            <p class="text-sm text-white/90">
                Admin memiliki akses penuh ke sistem. Pastikan akun ini selalu aman dan tidak dibagikan kepada orang lain.
            </p>

        </div>

    </div>

</div>

</body>
</html>