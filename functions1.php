<?php
	date_default_timezone_set('Asia/Jakarta');
	$conn = mysqli_connect("localhost", "root", "", "customer");

	global $conn;
	$errorUsername=$errorEmail=$errorAge=$errorPassword=$errorConfirm=" ";
	$message="";
	if(isset($_POST['register'])){
		$username = strtolower(stripslashes($_POST["username"]));
		$email = $_POST["email"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$dob = $_POST["dob"];
		$tgl=explode("-",$dob);
		$explode=$tgl[0];
		$datenow = date('Y');
		$gender = $_POST["gender"];
		$profpic = null;
		$bio = null;
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$confirm = mysqli_real_escape_string($conn, $_POST["confirm"]);

		$result = mysqli_query($conn, "SELECT username from users WHERE username = '$username'");
		$result1 = mysqli_query($conn, "SELECT email from users WHERE email = '$email'");

		
		$error=false;

		//cek username tidakboleh sama
		if(mysqli_fetch_assoc($result)){

			$errorUsername="Username already registered";
			$error=true;

		}
		//cek email tidak boleh sama
		if(mysqli_fetch_assoc($result1)){
			$errorEmail="Email already registered";
			$error=true;
		}
		// cek Umur dibawah 17tahun
		if(($datenow-$explode)<17){
		
			$errorAge="Must be at least 17 years of age";
			$error=true;
		}
		//cek konfirmasi password
		if(strlen($password)<6){
			$errorPassword="Password must be at least 6 characters";
			$error=true;
		}
		else if( $password !== $confirm){
			$errorConfirm="Password does not match";
			$error=true;
		}
		
		if($error==false){
			// enkripsi password
			$password = md5($_POST["password"]);
			$message="Succesfull register! Redirecting to login page...";
			// tambah user ke database
			mysqli_query($conn, "INSERT INTO users VALUES('$username', '$email','$password','$first_name', '$last_name', '$dob', '$gender',$profpic,$bio)");

			header("refresh:3;url=login.php");
		}
	}

?>
