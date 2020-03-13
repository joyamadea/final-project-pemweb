<?php 
$connect = mysqli_connect("localhost","root","","customer");
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>