<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // ================= LOGIN =================
    public function loginProcess()
{
    $session = session();
    $model = new UserModel();

    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {

        $session->set([
            'user_id' => $user['id_user'],
            'nama'    => $user['nama'],
            'email'   => $user['email'],
            'role'    => $user['role'], // 🔥 PENTING
            'login'   => true
        ]);

        // 🔥 REDIRECT BERDASARKAN ROLE
       if ($user['role'] == 'admin') {
    return redirect()->to('/admin')->with('success', 'Login admin berhasil!');
}

if ($user['role'] == 'kurir') {
    return redirect()->to('/kurir')->with('success', 'Login kurir berhasil!');
}

return redirect()->to('/')->with('success', 'Login berhasil!');
    }

    return redirect()->back()->with('error', 'Email atau password salah');
}

    // ================= REGISTER =================
    public function saveRegister()
    {
        $model = new UserModel();

        $model->insert([
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ]);

        return redirect()->to('/')->with('success', 'Register berhasil! Silakan login.');
    }

    // ================= LOGOUT =================
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    
}