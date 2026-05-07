<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'pages::index');

$routes->group('admin', ['filter' => 'role:admin'], function($routes){
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');
});


// Profile
$routes->get('profile', 'ProfileController::index');


// Pesanan flow
$routes->get('pesanan/pesanan', 'PemesananController::index');
$routes->post('pesanan/simpan', 'PemesananController::simpan');

// Rute
$routes->get('pesanan/pilih_rute', 'PemesananController::pilihRute');
$routes->post('pesanan/simpan_rute', 'PemesananController::simpanRute');

// Mobil
$routes->get('pesanan/pilih_mobil', 'PemesananController::pilihMobil');
$routes->get('pesanan/pilih_mobil/(:num)', 'PemesananController::simpanMobil/$1');

// Kursi
$routes->get('pesanan/pilih_kursi', 'PemesananController::pilihKursi');
$routes->post('pesanan/simpan_kursi', 'PemesananController::simpanKursi');

// Konfirmasi & simpan pesanan
$routes->get('pesanan/konfirmasi', 'PemesananController::konfirmasi');
$routes->post('pesanan/pesan', 'PemesananController::simpanDatabase');

// Tiket
$routes->get('pesanan/tiket', 'PemesananController::tiket');

// PROFILE
$routes->get('profile', 'ProfileController::index');
$routes->get('profile/edit_profile', 'ProfileController::edit');
$routes->post('profile/update', 'ProfileController::update');
$routes->get('profile/delete', 'ProfileController::delete');


// Admin group
$routes->group('admin', function($routes){
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
});

// sdit mobil
$routes->group('admin', function($routes){
    $routes->get('mobil', 'MobilAdmin::index');
    $routes->get('mobil/tambah', 'MobilAdmin::tambah');
    $routes->post('mobil/simpan', 'MobilAdmin::simpan');
    $routes->get('mobil/edit/(:num)', 'MobilAdmin::edit/$1');
    $routes->post('mobil/update/(:num)', 'MobilAdmin::update/$1');
    $routes->get('mobil/hapus/(:num)', 'MobilAdmin::hapus/$1');
    $routes->get('pesanan', 'PesananAdmin::index');
});


// edit rute
$routes->group('admin', function($routes){
    $routes->get('rute', 'RuteAdmin::index');
    $routes->get('rute/tambah', 'RuteAdmin::tambah');
    $routes->post('rute/simpan', 'RuteAdmin::simpan');
    $routes->get('rute/edit/(:num)', 'RuteAdmin::edit/$1');
    $routes->post('rute/update/(:num)', 'RuteAdmin::update/$1');
    $routes->get('rute/hapus/(:num)', 'RuteAdmin::hapus/$1');
});

// Admin - Pesan
    $routes->get('admin/pesan', 'Admin\PesanAdmin::index');
    $routes->get('admin/pesan/edit/(:num)', 'Admin\PesanAdmin::edit/$1');
    $routes->post('admin/pesan/update/(:num)', 'Admin\PesanAdmin::update/$1');
    $routes->get('admin/pesan/hapus/(:num)', 'Admin\PesanAdmin::hapus/$1');


//routes lihat user admin//
$routes->get('admin/data_user', 'Admin\Dashboard::dataUser');


//tentang & bantuan//
$routes->get('tambahan/bantuan', 'Page::bantuan');
$routes->get('tambahan/tentang', 'Page::tentang');

//admin edit isi tentang//
$routes->get('/admin/edit_tentang/', 'TentangAdmin::index');
$routes->post('/admin/edit_tentang/simpan', 'TentangAdmin::simpan');


//admin edit isi bantuan//
$routes->get('/admin/edit_bantuan', 'BantuanAdmin::index');
$routes->post('/admin/edit_bantuan/simpan', 'BantuanAdmin::simpan');

//edit slider halaman utama//
$routes->group('admin', function($routes){
    $routes->post('slider/save', 'Admin\SliderController::save');
    $routes->get('slider/delete/(:num)', 'Admin\SliderController::delete/$1');
});

// untuk slider admin
$routes->group('admin', function($routes){
    $routes->get('slider', 'Admin\SliderController::index');
    $routes->post('slider/save', 'Admin\SliderController::save');
    $routes->get('slider/delete/(:num)', 'Admin\SliderController::delete/$1');
});

$routes->get('admin/slider/index', 'Admin\SliderController::index');

// user
$routes->get('admin/user/edit/(:num)', 'Admin\Dashboard::editUser/$1');
$routes->post('admin/user/update/(:num)', 'Admin\Dashboard::updateUser/$1');
$routes->get('admin/user/delete/(:num)', 'Admin\Dashboard::deleteUser/$1');


$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('dataUser', 'Dashboard::dataUser');
    $routes->get('makeAdmin/(:num)', 'Dashboard::makeAdmin/$1');
    $routes->get('removeAdmin/(:num)', 'Dashboard::removeAdmin/$1');
});

// group admin dashboard
$routes->group('admin/dashboard', function($routes) {

    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dataUser', 'Admin\Dashboard::dataUser');


});
