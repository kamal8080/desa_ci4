<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profil', 'Profil::index');
$routes->get('/layanan', 'Layanan::index');
$routes->get('/berita', 'Berita::index');
$routes->get('/kegiatan', 'Kegiatan::index');
$routes->get('/kependudukan', 'Kependudukan::index');
$routes->get('/kontak', 'Kontak::index');

// AUTH LOGIN & REGISTER
$routes->get('login', 'Auth::index');
$routes->get('register', 'Auth::register');
$routes->post('login/cek_login', 'Auth::cek_login');
$routes->get('register', 'Auth::register');
$routes->post('register/save_register', 'Auth::save_register');
$routes->get('logout', 'Auth::logout');

// AUTH ADMIN 
$routes->get('dashboard', 'admin::index');

// ADMIN BERITA
$routes->get('dashboard/berita', 'Berita::AdminBerita');
$routes->post('dashboard/berita/TambahData', 'Berita::TambahData');
$routes->post('dashboard/berita/EditData/(:num)', 'Berita::EditData/$1');
$routes->post('dashboard/berita/HapusData/(:num)', 'Berita::HapusData/$1');

// ADMIN PEMBERITAHUAN
$routes->get('dashboard/pemberitahuan', 'Pemberitahuan::AdminPemberitahuan');
$routes->post('dashboard/pemberitahuan/TambahData', 'Pemberitahuan::TambahData');
$routes->post('dashboard/pemberitahuan/EditData/(:num)', 'Pemberitahuan::EditData/$1');
$routes->post('dashboard/pemberitahuan/HapusData/(:num)', 'Pemberitahuan::HapusData/$1');

// ADMIN PROFILE
$routes->get('dashboard/profil', 'Profil::AdminProfil');
$routes->post('dashboard/profil/EditData/(:num)', 'Profil::EditData/$1');

// ADMIN KEPENDUDUKAN
$routes->get('dashboard/kependudukan', 'Kependudukan::AdminKependudukan');
$routes->post('dashboard/kependudukan/EditData/(:num)', 'Kependudukan::EditData/$1');

// ADMIN KONTAK
$routes->get('dashboard/kontak', 'Kontak::AdminKontak');
$routes->post('dashboard/kontak/EditData/(:num)', 'Kontak::EditData/$1');

// ADMIN USER
$routes->get('dashboard/user', 'ListUser::index');
$routes->post('dashboard/user/EditData/(:num)', 'ListUser::EditData/$1');