<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Method sebelum request diproses
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek apakah user sudah login
        if (!$session->has('karyawan_id')) {

            // Simpan pesan error ke flashdata
            session()->setFlashdata(
                'error',
                'Silakan login terlebih dahulu.'
            );

            // Redirect ke halaman login
            return redirect()->to('/login');
        }

        /**
         * Cek role/jabatan jika route menggunakan argument
         * Contoh:
         * ['filter' => 'auth:kepala_toko']
         */
        if (!empty($arguments)) {

            $jabatan = $session->get('jabatan');

            // Jika jabatan tidak sesuai
            if (!in_array($jabatan, $arguments)) {

                session()->setFlashdata(
                    'error',
                    'Anda tidak memiliki akses ke halaman ini.'
                );

                return redirect()->back();
            }
        }
    }

    /**
     * Method setelah request diproses
     */
    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Tidak digunakan
    }
}