<?php
    include_once("config.php");

    $error=" ";
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        

        if(empty($username) || empty($password)){
            $error="Username or password do not match";
        }
        else{
            $password=md5($password);
            $query=$db->prepare("SELECT username FROM users WHERE username=? AND password=?");
            //echo var_dump($query);
            $query->bind_param("ss",$username,$password);
            $query->execute();
            $query->bind_result($username);
            $query->store_result();
            if($query->num_rows==1){
                if($query->fetch()){
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['loggedin']=true;
                    
                    header("location: home.php");
                }
            }
            else{
                $error="Username or password do not match";
            }
            $query->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css"/>


</head>
<body style="background:url(https://gradients.design/public/uploads/files/db7.png)">
    
    <div class="modal-dialog modal-dialog-centered mt-5	mb-5" style="border:0px;">
        <div class="modal-content" style="background-color: #f9f9f9;">
            <div class="modal-header">
				<h1 class="modal-title col-12 text-center">Login</h1>
			</div>
            <div class="modal-body">
                <form class="form-group" method="post" action="login.php">
                    <div class="form-group">
                        <input type="text" placeholder="Username" class="form-control" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username']:'';?>">
                    </div>
                    
                    <input type="password" placeholder="Password" class="form-control" name="password">

                    <p style="color:red;"><?php echo $error?></p>

                    <div class="form-group col-12 text-center">
						<button type="submit" class="btn btn-2" name="login"><strong>Login</strong></button>
					</div>
                    
                </form>
            </div>

            <div class="modal-footer">
				<div style="color:grey;" class="col-12 text-center">Don't have an account?  
                <a href="register.php">Register</a></div>
			</div>
        </div>
    </div>
</body>
</html>

