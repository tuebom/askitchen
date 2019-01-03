<?php 
session_start(); // untuk memulai sebuah session baik session username, password maupun captcha
include "koneksi.php"; //untuk melakukan koneksi ke database

$username = $_POST['username'];
$pass     = $_POST['password'];


if (empty($username)){
  echo "Anda belum mengisikan Username<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($pass)){
  echo "Anda belum mengisikan Password<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
	if(!empty($_POST['captcha'])){
		if($_POST['captcha']==$_SESSION['captcha_session']){

			// fungsi untuk melakukan login dengan memanggil tabel users
			$login=mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$pass'");
			$cocok=mysqli_num_rows($login);
			$tampilkan=mysqli_fetch_array($login);

			// Apabila username dan password telah cocok atau ditemukan
			if ($cocok > 0){
			  session_start();
			   
				// bikin variabel session
				$_SESSION['username']     = $tampilkan['username'];
				$_SESSION['password']     = $tampilkan['password'];
				$_SESSION['nama_lengkap'] = $tampilkan['nama_lengkap'];
				$_SESSION['level']        = $tampilkan['level'];
				
				$sid_lama = session_id();
				session_regenerate_id();
				$sid_baru = session_id();
				mysqli_query($con, "UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
				header('location:hal_admin.php');
			}
			else{
			  echo "<div id=\"login\"><h1>Username & Password salah!!</h1>";
				echo "<p><a href=\"login.php\">Ulangi Lagi</a></p></div>";
			 }
		}
		else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=\"login.php\"><b>Ulangi Lagi</b></a>";
		}
	}
	else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=\"login.php\"><b>Ulangi Lagi</b></a>";
	}
	}
?>