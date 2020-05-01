<?php

// $router = $di->getRouter();

// Define your routes here

// $router->handle($_SERVER['REQUEST_URI']);


$router = $di->getRouter();

// Default route
$router->add('/', ['controller' => 'index', 'action' => 'index']);

// Define your routes here
$router->add('/user/loginpage', ['controller' => 'user', 'action' => 'loginpage']);
$router->add('/user/login', ['controller' => 'user', 'action' => 'login']);
$router->add('/user/signuppage', ['controller' => 'user', 'action' => 'signuppage']);
$router->add('/user/register', ['controller' => 'user', 'action' => 'register']);
$router->add('/user/profile', ['controller' => 'user', 'action' => 'profile']);
$router->add('/user/editprofile', ['controller' => 'user', 'action' => 'editprofile']);
$router->add('/user/editedprofile', ['controller' => 'user', 'action' => 'editedprofile']);
$router->add('/user/logout', ['controller' => 'user', 'action' => 'logout']);

// Kegiatan Routes
$router->add('/kegiatan/aturKegiatan', ['controller' => 'kegiatan', 'action' => 'aturKegiatan']);
$router->add('/kegiatan/lihatKegiatan', ['controller' => 'kegiatan', 'action' => 'lihatKegiatan']);
$router->add('/kegiatan/lihatPendaftar', ['controller' => 'kegiatan', 'action' => 'lihatPendaftar']);
$router->add('/kegiatan/detailKegiatan', ['controller' => 'kegiatan', 'action' => 'detailKegiatan']);
$router->add('/kegiatan/daftarKegiatan', ['controller' => 'kegiatan', 'action' => 'daftarKegiatan']);
$router->add('/kegiatan/cancelDaftar', ['controller' => 'kegiatan', 'action' => 'cancelDaftar']);
$router->add('/kegiatan/addKegiatan', ['controller' => 'kegiatan', 'action' => 'addKegiatan']);
$router->add('/kegiatan/editKegiatan', ['controller' => 'kegiatan', 'action' => 'editKegiatan']);
$router->add('/kegiatan/hapusKegiatan', ['controller' => 'kegiatan', 'action' => 'hapusKegiatan']);

// Saran Routes
$router->add('/saran/tambahsaran', ['controller' => 'saran', 'action' => 'tambahsaran']);
$router->add('/saran/add', ['controller' => 'saran', 'action' => 'add']);
$router->add('/saran/lihatsaran', ['controller' => 'saran', 'action' => 'lihatsaran']);

// Uang Routes
$router->add('/uang/tambahuang', ['controller' => 'uang', 'action' => 'tambahuang']);
$router->add('/uang/kuranguang', ['controller' => 'uang', 'action' => 'kuranguang']);
$router->add('/uang/addUang', ['controller' => 'uang', 'action' => 'addUang']);
$router->add('/uang/lihatUang', ['controller' => 'uang', 'action' => 'lihatUang']);
$router->add('/uang/pengeluaran', ['controller' => 'uang', 'action' => 'pengeluaran']);


// return $router; 
$router->handle($_SERVER['REQUEST_URI']);
