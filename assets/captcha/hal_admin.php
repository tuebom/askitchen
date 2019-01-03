<?php
session_start(); //untuk session username dan password
include "koneksi.php"; //melakukan pemanggilan koneksi ke database
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h1\">Untuk mengakses halaman administrator, Anda harus login!.</h1>
        <p><a href=\"login.php\">LOGIN</a></p>";  
}
else {
	echo "<p>Hai, <b>$_SESSION[nama_lengkap]</b> Selamat Datang di Halaman Administrator</b>.</p>";
}
?>