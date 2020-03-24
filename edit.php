<?php
    include_once("config.php");
    session_start();

    $editUser=$_GET['username'];

    if($_SESSION["loggedin"]==true && $_SESSION["username"]==$editUser){
        $username=$_GET['username'];
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $db->query($query) or die($db->error);

        //fetching to variables
        while($row = $result->fetch_assoc()){
            $image=$row['profile_pic'];
            $bio=$row['bio'];
            $firstName=$row['first_name'];
            $lastName=$row['last_name'];
            $email=$row['email'];
        }
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
    <link rel="stylesheet" href="styles.css"/>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> -->
</head>
<body style="background:url(https://gradients.design/public/uploads/files/v16.png)">
    <div class="modal-dialog modal-dialog-centered mt-5	mb-5" style="border:0px;">
		<div class="modal-content" style="background-color: #f9f9f9;">
			<div class="modal-header">
				<h1 class="modal-title col-12 text-center">Edit Profile</h1>
			</div>
			<div class="modal-body">
				<form action="add.php?username=<?php echo $username?>" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                    <img src="<?php if(empty($image)){ echo "images/profile/profile.png";}else{echo $image; }?>" class="text-center"  style='width:100px;
                            height:100px;
                            object-fit:cover;
                            border-radius: 100px;
                            margin-right:13px;' >
                    </div>
                    <div class="form-group row justify-content-center">
                        
                        <input type="file" id="uploadFile1" name="uploadFile1">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control" name="username" id="username" value="<?php echo $username;?>" disabled>
					</div>
					<div class="form-group">
						<input type="email" placeholder="Email" class="form-control" name="email" id="email" value="<?php echo $email;?>" disabled>
						
					</div>
                    <div class="form-group">
                        <textarea name='bio' placeholder="Biography" class='form-control' rows='1'><?php echo $bio;?></textarea>
						
					</div>
					
					<!-- <div class="form-group">
						<input type="password" placeholder="Password" class="form-control" name="password" id="password" minlength="6" required>
						
					</div>
					<div class="form-group">
						<input type="password" placeholder="Confirm Password" class="form-control" name="confirm" id="confirm" required>
					
					</div> -->
					<div class="form-group col-12 text-center">
                    <button type="button" onclick="window.location='user.php?username=<?php echo $username?>'" class="btn btn-3" name="edit"><strong>Back to Profile</strong></button>
						<button type="submit" class="btn btn-1" name="edit"><strong>Update Profile</strong></button>
					</div>
				</form>
			</div>

		</div>
	</div>
    
</body>
</html>