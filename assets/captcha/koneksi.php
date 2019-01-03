<?php
// Membuat koneksi
$con=mysqli_connect("localhost","root","","master_php"); 

// Melakukan pengecekan koneksi
if (mysqli_connect_errno()) {
  echo "Koneksi Gagal !: " . mysqli_connect_error();
}
?>