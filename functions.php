<?php
$conn = mysqli_connect("localhost", "root", "", "customer");

function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = $data["email"];
	$first_name = $data["first_name"];
	$last_name = $data["last_name"];
	$dob = $data["dob"];
	$gender = $data["gender"];
	$profpic = null;
	$bio = null;
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$confirm = mysqli_real_escape_string($conn, $data["confirm"]);

	//cek konfirmasi password
	if( $password !== $confirm){
		echo "<script>
				alert('Password tidak sesuai!');
		</script>";
		return false;
	}
	// enkripsi password
	$password = md5($password);

	// tambah user ke database
	mysqli_query($conn, "INSERT INTO users VALUES('$username', '$email','$password','$first_name', '$last_name', '$dob', '$gender','$profpic','$bio')");

	return mysqli_affected_rows($conn);
}

?>