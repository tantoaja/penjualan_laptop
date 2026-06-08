<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setAutoRoute(true);

// ================= HOME =================
$routes->get('/', 'Home::index');

// ================= AUTH =================
$routes->post('login/process', 'Auth::loginProcess');
$routes->post('register/save', 'Auth::saveRegister');
$routes->get('logout', 'Auth::logout');

// ================= USER =================
$routes->get('produk', 'Produk::index');
$routes->get('ulasan', 'Ulasan::index');
$routes->get('tentang', 'Tentang::index');
$routes->post('order/save', 'OrderController::save');
$routes->get('profile', 'ProfileController::index');

// ================= ADMIN =================
$routes->get('admin', 'Admin::index');
$routes->get('admin/profile', 'Admin::profile');
$routes->get('admin/ulasan', 'Admin::ulasan');
$routes->get('admin/order', 'Admin::order');
$routes->post('admin/order/update/(:num)', 'Admin::updateStatus/$1');
$routes->get('admin/produk', 'Admin::produk');
$routes->post('admin/produk/create', 'Admin::produkCreate');
$routes->post('admin/produk/update/(:num)', 'Admin::produkUpdate/$1');
$routes->get('admin/produk/delete/(:num)', 'Admin::produkDelete/$1');
$routes->get('admin/order/shipping/(:num)', 'Admin::shipping/$1');
$routes->get('kurir', 'Kurir::index');

$routes->get('kurir', 'Kurir::index');
$routes->get('kurir/formSelesai/(:num)', 'Kurir::formSelesai/$1');
$routes->post('kurir/prosesSelesai/(:num)', 'Kurir::prosesSelesai/$1');
$routes->get('admin/ulasan/delete/(:num)', 'Admin::delete/$1');
$routes->get('admin/produk/edit/(:num)', 'Admin::edit/$1');
$routes->post('admin/produk/update/(:num)', 'Admin::update/$1');
$routes->get('order/cancel/(:num)', 'OrderController::cancel/$1');
$routes->post('ulasan/simpan', 'Ulasan::simpan');
$routes->get('admin/export-laporan-2026', 'Admin::exportLaporan2026');
$routes->get(
    'admin/ulasan/export-rating-terbaik',
    'Admin::exportRatingTerbaik'
);