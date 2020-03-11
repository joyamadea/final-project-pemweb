<?php
require 'functions.php';

if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		// echo "<script>
		// 			alert('User berhasil ditambahkan!');
		// 	</script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tugas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background-image: url(https://www.ilmubahasa.net/wp-content/uploads/2018/10/backgroundkeren1.jpg)">

	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" style="background-color: #f9f9f9;">
			<div class="modal-header">
				<h4 style="font-size: 45px; text-align:center;" class="modal-title"><strong> Sign Up</strong></h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="username">Username :</label>
						<input type="text" class="form-control" name="username" id="username" required>
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="email" class="form-control" name="email" id="email" required>
					</div>
					<div class="form-group">
						<label for="first_name">First Name :</label>
						<input type="text" class="form-control" name="first_name" id="first_name" required>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name :</label>
						<input type="text" class="form-control" name="last_name" id="last_name">
					</div>
					<div class="form-group">
						<label for="dob">Date of Birth :</label>
						<input type="date" class="form-control" name="dob" id="dob" required>
					</div>
					<div class="form-group">
						<label for="gender">Gender :</label>
						<select class="form-control" name="gender">
							<option value="">- Pilih Jenis Kelamin -</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="password">Password :</label>
						<input type="password" class="form-control" name="password" id="password" minlength="6" required>
					</div>
					<div class="form-group">
						<label for="confirm">Konfirmasi Password :</label>
						<input type="password" class="form-control" name="confirm" id="confirm" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="register">Register!</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</body>

</html>