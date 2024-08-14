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
// AUTH ROUTES
$routes->get('login', 'Auth::index');