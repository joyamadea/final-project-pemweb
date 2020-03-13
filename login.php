<?php 
session_start();

include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");

$check = mysqli_num_rows($data);

if($check > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/index.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>