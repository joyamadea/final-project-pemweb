<?php
	require 'functions1.php';	
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tugas</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<!-- tyle="background-image: url(https://www.ilmubahasa.net/wp-content/uploads/2018/10/backgroundkeren1.jpg)" -->
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="">Register <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            </ul>
        </div>
    </nav>

	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" style="background-color: #f9f9f9;">
			<div class="modal-header">
				<h4 style="font-size: 45px; text-align:center;" class="modal-title"><strong> Sign Up</strong></h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="username">Username :</label>
						<input type="text" class="form-control" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username']:'';?>" required>
						<p class="text-danger"><?php echo $errorUsername?></p>
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="email" class="form-control" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email']:'';?>" required>
						<p class="text-danger"><?php echo $errorEmail?></p>
					</div>
					<div class="form-group">
						<label for="first_name">First Name :</label>
						<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name']:'';?>" required>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name :</label>
						<input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name']:'';?>">
					</div>
					<div class="form-group">
						<label for="dob">Date of Birth :</label>
						<input type="date" class="form-control" name="dob" id="dob" required value="<?php echo isset($_POST['dob']) ? $_POST['dob']:'';?>">
						<p class="text-danger"><?php echo $errorAge?></p>
					</div>
					<div class="form-group">
						<label for="gender">Gender :</label>
						<select class="form-control" name="gender">
							<option value="">- Pilih Jenis Kelamin -</option>
							<option value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Male') { ?>selected="true" <?php }; ?>>Male</option>
							<option value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Female') { ?>selected="true" <?php }; ?>>Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="password">Password :</label>
						<input type="password" class="form-control" name="password" id="password" minlength="6" required>
						<p class="text-danger"><?php echo $errorPassword?></p>
					</div>
					<div class="form-group">
						<label for="confirm">Konfirmasi Password :</label>
						<input type="password" class="form-control" name="confirm" id="confirm" required>
						<p class="text-danger"><?php echo $errorConfirm?></p>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="register">Register!</button>
					</div>
				</form>

				<p class="text-success"><?php echo $message?></p>
			</div>

		</div>
	</div>
</body>

</html>