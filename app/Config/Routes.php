<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/registrasi', 'Registrasi::index'); // Menampilkan halaman registrasi
$routes->post('/proses_registrasi', 'Registrasi::prosesRegistrasi'); // Memproses form registrasi
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');
$routes->post('/ajukansurat', 'Home::ajukanSurat');
// Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/detail/(:num)', 'Admin::detail/$1');
$routes->post('/admin/approve/(:num)', 'Admin::approve/$1');
$routes->post('/admin/reject/(:num)', 'Admin::reject/$1');

// Kepala Desa
$routes->get('/kepala-desa', 'KepalaDesa::index');
$routes->post('/kepala-desa/tanda-tangan/(:num)', 'KepalaDesa::tandaTangan/$1');
$routes->get('/registrasi-aparat', 'RegistrasiAparat::index');
$routes->post('/registrasi-aparat', 'RegistrasiAparat::proses');
$routes->get('/admin/pengajuan', 'Admin::pengajuan');
