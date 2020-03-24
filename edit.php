<?php
    session_start();

    $editUser=$_GET['username'];

    if($_SESSION["loggedin"]==true && $_SESSION["username"]==$editUser){

    }
    else{
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> -->
</head>
<body>
    <div class="modal-dialog modal-dialog-centered mt-5	mb-5" style="border:0px;">
		<div class="modal-content" style="background-color: #f9f9f9;">
			<div class="modal-header">
				<h1 class="modal-title col-12 text-center">Register</h1>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username']:'';?>" required>
						<p class="text-danger"><?php echo $errorUsername?></p>
					</div>
					<div class="form-group">
						<input type="email" placeholder="Email" class="form-control" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email']:'';?>" required>
						<p class="text-danger"><?php echo $errorEmail?></p>
					</div>
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" name="first_name" id="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name']:'';?>" required>
					</div>
					<div class="form-group">
						<input type="text" placeholder="Last Name" class="form-control" name="last_name" id="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name']:'';?>">
					</div>
					<div class="form-group">
						<input type="date" placeholder="Date of Birth" class="form-control" name="dob" id="dob" required value="<?php echo isset($_POST['dob']) ? $_POST['dob']:'';?>">
						<p class="text-danger"><?php echo $errorAge?></p>
					</div>
					<div class="form-group">
						<select class="form-control" name="gender">
							<option value="">- Gender -</option>
							<option value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Male') { ?>selected="true" <?php }; ?>>Male</option>
							<option value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Female') { ?>selected="true" <?php }; ?>>Female</option>
						</select>
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" class="form-control" name="password" id="password" minlength="6" required>
						<p class="text-danger"><?php echo $errorPassword?></p>
					</div>
					<div class="form-group">
						<input type="password" placeholder="Confirm Password" class="form-control" name="confirm" id="confirm" required>
						<p class="text-danger"><?php echo $errorConfirm?></p>
					</div>
					<div class="form-group col-12 text-center">
						<button type="submit" class="btn btn-1" name="register"><strong>Register</strong></button>
					</div>
				</form>

				<p class="text-success"><?php echo $message?></p>
			</div>

			<div class="modal-footer">
				<div style="color:grey;" class="col-12 text-center">Already have an account? 
                <a href="login.php">Login</a></div>
			</div>

		</div>
	</div>
    
</body>
</html>