<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/registrasi', 'Auth::registrasi');
$routes->post('/registrasi/simpan', 'Auth::simpanRegistrasi');
$routes->post('/login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');
$routes->group('', ['filter' => 'auth'], static function ($routes) {
//peserta
$routes->get('/peserta/index', 'Home::peserta');
$routes->get('/peserta/index', 'Home::peserta');
$routes->get('/peserta/menu/cara_pengajuan', 'Home::cara_pengajuan');
$routes->get('/peserta/menu/tentang_pengajuan', 'Home::tentang_pengajuan');
$routes->get('/peserta/pengajuan', 'Home::pengajuan');
$routes->post('/pengajuan/simpan', 'Pengajuan::simpan');
$routes->get('/peserta/riwayat', 'Pengajuan::riwayat');
// $routes->get('/login', 'Home::login');

//admin
$routes->group('', ['filter' => 'auth:admin'], function ($routes) {
$routes->get('/admin/dashboard', 'Home::admin');
$routes->get('/admin/pengajuan', 'Pengajuan::index');
$routes->get('/admin/setujui/(:num)', 'Pengajuan::setujui/$1');
$routes->get('/admin/tolak/(:num)', 'Pengajuan::tolak/$1');
$routes->get('/admin/detail/(:any)', 'Pengajuan::detail/$1');
$routes->get('/admin/download/(:any)', 'Pengajuan::download/$1');
$routes->get('/admin/tambahAdmin', 'Auth::tambahAdmin');
$routes->post('/admin/simpanAdmin', 'Auth::simpanAdmin');

});

});