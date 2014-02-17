<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
session_set_cookie_params('3600');
//ini_set('session.gc_maxlifetime', 60*60*24);

date_default_timezone_set('Asia/Jakarta');
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);
$f3=require('lib/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

//define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);
//$target_path = "/home/rian/upload/";

$f3->set('UI','ui/; view/');
$f3->set('LOCALES','dict/');
$f3->set('AUTOLOAD','classes/; classes/controller/; classes/jsonrpc/; classes/document/; classes/Bouncer/');

$f3->route('GET|POST /', 'login->index');
$f3->route('GET|POST /cabang', 'cabang->index');
$f3->route('GET|POST /type', 'type->index');
$f3->route('GET|POST /biodata', 'biodata->index');
$f3->route('GET|POST /jabatan', 'jabatan->index');
$f3->route('GET|POST /departement', 'departement->index');
$f3->route('GET|POST /agama', 'agama->index');
$f3->route('GET|POST /bulan', 'bulan->index');
$f3->route('GET|POST /index', 'welcome->index');
$f3->route('GET|POST /status_pegawai', 'status_pegawai->index');

$f3->route('GET|POST /biodata/index', 'biodata->index');
$f3->route('GET|POST /biodata/add', 'biodata->add');
$f3->route('GET|POST /biodata/edit', 'biodata->edit');
$f3->route('GET|POST /biodata/detail', 'biodata->detail');
$f3->route('GET|POST /biodata/delete', 'biodata->delete');

$f3->route('GET|POST /jabatan/index', 'jabatan->index');
$f3->route('GET|POST /jabatan/add', 'jabatan->add');
$f3->route('GET|POST /jabatan/edit', 'jabatan->edit');
$f3->route('GET|POST /jabatan/delete', 'jabatan->delete');

$f3->route('GET|POST /departement/index', 'departement->index');
$f3->route('GET|POST /departement/add', 'departement->add');
$f3->route('GET|POST /departement/edit', 'departement->edit');
$f3->route('GET|POST /departement/delete', 'departement->delete');

//
$f3->route('GET|POST /agama/index', 'agama->index');
$f3->route('GET|POST /agama/add', 'agama->add');
$f3->route('GET|POST /agama/edit', 'agama->edit');
$f3->route('GET|POST /agama/delete', 'agama->delete');

//
$f3->route('GET|POST /bulan/index', 'bulan->index');
$f3->route('GET|POST /bulan/add', 'bulan->add');
$f3->route('GET|POST /bulan/edit', 'bulan->edit');
$f3->route('GET|POST /bulan/delete', 'bulan->delete');

$f3->route('GET|POST /welcome/index', 'welcome->index');
$f3->route('GET|POST /welcome/add', 'welcome->add');
$f3->route('GET|POST /welcome/edit', 'welcome->edit');
$f3->route('GET|POST /welcome/delete', 'welcome->delete');
$f3->route('GET|POST /welcome/laporan', 'welcome->laporan');

$f3->route('GET|POST /cabang/index', 'cabang->index');
$f3->route('GET|POST /cabang/add', 'cabang->add');
$f3->route('GET|POST /cabang/edit', 'cabang->edit');
$f3->route('GET|POST /cabang/delete', 'cabang->delete');

$f3->route('GET|POST /type/index', 'type->index');
$f3->route('GET|POST /type/add', 'type->add');
$f3->route('GET|POST /type/edit', 'type->edit');
$f3->route('GET|POST /type/delete', 'type->delete');

//
$f3->route('GET|POST /status_pegawai/index', 'status_pegawai->index');
$f3->route('GET|POST /status_pegawai/add', 'status_pegawai->add');
$f3->route('GET|POST /status_pegawai/edit', 'status_pegawai->edit');
$f3->route('GET|POST /status_pegawai/delete', 'status_pegawai->delete');

$f3->route('GET|POST /absensi/index', 'absensi->index');
$f3->route('GET|POST /absensi/add', 'absensi->add');
$f3->route('GET|POST /absensi/edit', 'absensi->edit');

$f3->run();
