<?php 
session_start();

include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($connect,"select * from users where username='$username' and password='$password'");

$check = mysqli_num_rows($data);

if($check > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:index.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>
