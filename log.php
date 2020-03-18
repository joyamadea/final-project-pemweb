<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //header("location: index.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Mohon isi data untuk login..</p>
        <form action="login.php" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>User ID</label>
                <input type="text" name="user_id" class="form-control" required>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <!-- <div class="form-group">
                <form id="comment-form" action="responses.php" method="post">
                    <div class="g-recaptcha" data-sitekey="6Le7NuIUAAAAALis8kcrRM1QUpBbbhvg-MUeo_N6" style="margin-bottom: 10px"></div>
                    <input type="submit" name="submit" value="submit" required>
            </div>     -->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <!-- <p>Tidak punya akun? <a href="register.php">Daftar disini</a>.</p> -->
        </form>
    </div>    
</body>
</html>