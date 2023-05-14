<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//dashboard
$routes->get('/dashboard', 'DashboardController::index');

//karyawan
$routes->get('/karyawan/', 'karyawanController::index');
$routes->get('/karyawan/tambah', 'karyawanController::tambahKaryawan');
$routes->get('/karyawan/edit/(:any)', 'karyawanController::editKaryawan/$1');
$routes->get('/karyawan/update/(:any)', 'karyawanController::updateKaryawan/$1');
$routes->get('/karyawan/hapus/(:any)', 'karyawanController::hapusKaryawan/$1');
$routes->get('/karyawan/ajaxindex', 'karyawanController::ajaxIndex');

//jabatan
$routes->get('/jabatan/', 'JabatanController::index');
$routes->get('/jabatan/tambah', 'JabatanController::tambahJabatan');
$routes->get('/jabatan/edit/(:any)', 'JabatanController::editJabatan/$1');
$routes->get('/jabatan/update/(:any)', 'JabatanController::updateJabatan/$1');
$routes->get('/jabatan/hapus/(:any)', 'JabatanController::hapusJabatan/$1');

//absen
$routes->get('/absen/', 'AbsenController::index');
$routes->get('/absen/tambah', 'AbsenController::tambahAbsen');
$routes->get('/absen/lembur/(:any)', 'AbsenController::lemburAbsen/$1');


//gaji
$routes->get('/gaji/', 'GajiController::index');
$routes->get('/gaji/lihat/(:any)', 'GajiController::Gaji');
$routes->get('/gaji/bayar/(:any)', 'GajiController::lihatGaji/$1');
$routes->get('/gaji/pinjam/(:any)', 'GajiController::pinjamGaji/$1');
$routes->get('/gaji/detail/(:any)', 'GajiController::detailGaji/$1');

//pinjam
$routes->get('/pinjam/', 'PinjamController::index');
$routes->get('/pinjam/tambah', 'PinjamController::tambahPinjam');

//laporan
$routes->get('/laporan', 'laporan::index');
$routes->get('/laporan/lihat/(:any)/(:any)', 'laporan::lihatLaporan/$1/$2');

//auth
$routes->get('/masuk', 'AuthController::Login');
$routes->post('/masuk', 'AuthController::cekLogin');
$routes->get('/logout', 'AuthController::Logout');

//daftar
$routes->get('/register', 'DaftarController::index');
$routes->post('/register', 'DaftarController::Register');

//profil
$routes->get('/profil/(:any)', 'ProfilController::index/$1');
$routes->post('/profil/updateprofil/(:any)', 'ProfilController::settingProfil/$1');


//user management
$routes->get('/user-management', 'UserManageController::index',['filter' => 'role:admin']);
$routes->post('Dashboard/ManageUser/edit/(:any)', 'UserManageController::updateUser/$1',['filter' => 'role:admin']);
$routes->post('Dashboard/ManageUser/delete/(:any)', 'UserManageController::delUser/$1',['filter' => 'role:admin']);

//absensi
$routes->get('/absensi', 'AbsensiController::index',['filter' => 'role:admin']);
$routes->post('/profil/tambahabsen/', 'AbsensiController::saveAbsen',['filter' => 'role:admin']);
$routes->post('Dashboard/AbsenGuru/edit/(:any)', 'AbsensiController::updateAbsen/$1',['filter' => 'role:admin']);
$routes->post('Dashboard/AbsenGuru/delete/(:any)', 'AbsensiController::deleteAbsen/$1',['filter' => 'role:admin']);
$routes->post('totalabsen/hapus', 'AbsensiController::deleterowabsen',['filter' => 'role:admin']);



//gaji
$routes->get('/gaji', 'GajiController::index',['filter' => 'role:admin']);
$routes->post('Dashboard/gaji/guru/(:any)', 'GajiController::svGaji/$1',['filter' => 'role:admin']);
$routes->get('/lihatgaji/(:any)', 'GajiController::lihatgaji/$1',['filter' => 'role:admin']);
$routes->post('Dashboard/buatgaji/guru/(:any)', 'GajiController::buatGaji/$1',['filter' => 'role:admin']);



//mapel
$routes->get('/mapel', 'GroupMapelController::index',['filter' => 'role:admin']);
$routes->post('profil/tambahmapel', 'GroupMapelController::svMapel',['filter' => 'role:admin']);
$routes->post('Dashboard/mapel/delete/(:any)', 'GroupMapelController::deleteMapel/$1',['filter' => 'role:admin']);
$routes->post('profil/editmapel/(:any)', 'GroupMapelController::updateMapel/$1',['filter' => 'role:admin']);




//kelas
$routes->get('/kelas', 'KelasController::index',['filter' => 'role:admin']);
$routes->post('profil/tambahkelas', 'KelasController::svkelas',['filter' => 'role:admin']);
$routes->post('profil/editkelas/(:any)', 'KelasController::updatekelas/$1',['filter' => 'role:admin']);
$routes->post('Dashboard/kelas/delete/(:any)', 'KelasController::deletekelas/$1',['filter' => 'role:admin']);



//ajar
$routes->get('/ajar', 'DataAjarController::index',['filter' => 'role:admin']);
$routes->get('/tambahajar', 'DataAjarController::tambahajar',['filter' => 'role:admin']);
$routes->post('profil/tambahajar', 'DataAjarController::svtambahajar',['filter' => 'role:admin']);
$routes->get('/editajar/(:any)', 'DataAjarController::editajar/$1',['filter' => 'role:admin']);
$routes->post('profil/updateajar/(:any)', 'DataAjarController::updateajar/$1',['filter' => 'role:admin']);
$routes->post('Dashboard/ajar/delete/(:any)', 'DataAjarController::deleteajar/$1',['filter' => 'role:admin']);

$routes->post('/totalajar/hapus', 'DataAjarController::deleterowajar',['filter' => 'role:admin']);





//GURU

//Jadwal Mengajar
$routes->get('/jadwal', 'JadwalMengajarController::index',['filter' => 'role:guru']);

//Lupa Password
$routes->get('/forgot-password', 'ForgotPassword::index');
$routes->post('forgot_password/reset_password', 'ForgotPassword::reset_password');
$routes->get('reset-password/(:segment)', 'ResetPassword::index/$1');
$routes->post('reset_password/update_password', 'UpdatePassword::update_password');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
