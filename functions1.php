<?php
date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost", "root", "", "customer");

function registrasi($data){
	global $conn;
	
	$username = strtolower(stripslashes($data["username"]));
	$email = $data["email"];
	$first_name = $data["first_name"];
	$last_name = $data["last_name"];
	$dob = $data["dob"];
	$tgl=explode("-",$dob);
	$explode=$tgl[0];
	$datenow = date('Y');
	$gender = $data["gender"];
	$profpic = $data['profpic'];
	$bio = $data["bio"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$confirm = mysqli_real_escape_string($conn, $data["confirm"]);

	$result = mysqli_query($conn, "SELECT username from users WHERE username = '$username'");
	$result1 = mysqli_query($conn, "SELECT email from users WHERE email = '$email'");

	//cek username tidakboleh sama
	if(mysqli_fetch_assoc($result)){
		echo "<script>
		alert('Username sudah terdaftar!')
		</script>";

		return false;
	}
	//cek email tidak boleh sama
	if(mysqli_fetch_assoc($result1)){
		echo "<script>
		alert('Email sudah digunakan!')
		</script>";

		return false;
	}
	// cek Umur dibawah 17tahun
	if(($datenow-$explode)<17)
	{
		echo "<script>
		alert('Kurrang umur!')
		</script>";

		return false;
	}
	//cek konfirmasi password
	if( $password !== $confirm){
		// echo "<p style='color: red; font-style: italic;'>ID/Password Salahhhhhhhhhhhhh!</p>";
		// header('registerasi.php');
		echo "<script>
				alert('Password tidak sesuai!');
		</script>";
		return false;
	}
	
	
	
	// enkripsi password
	$password = md5($_POST["password"]);

	// tambah user ke database
	mysqli_query($conn, "INSERT INTO users VALUES('$username', '$email','$first_name', '$last_name', '$dob', '$gender','$profpic','$bio',  '$password')");

	return mysqli_affected_rows($conn);
}



?>
