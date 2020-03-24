<?php
    include_once("config.php");
    session_start();
    $_SESSION['count'] = time();
    $image;
    $error=" ";
    $errorCaptcha=" ";
    $flag = 5;
    if(isset($_POST['login']) && isset($_POST["flag"])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $input = $_POST["input"];
        $flag = $_POST["flag"];
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
            if($query->num_rows==1 && $flag == 1){
                if($input == $_SESSION['captcha_string']){
                    if($query->fetch()){
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['loggedin']=true;
                    
                    header("location: home.php");
                    }
                }else{
                    $errorCaptcha="Captcha anda salah";
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
                        <br>
                    
                    <input type="password" placeholder="Password" class="form-control" name="password">
                    
                    <?php                      
                    create_image();
                    display();
                    ?>
                    <?php
                    function display()
                    {
                    ?>
                        <div style="text-align:center;">
                            <div style="display:block;margin-bottom:20px;margin-top:20px;">
                                <img src="images/image<?php echo $_SESSION['count'] ?>.png">
                            </div>
                            <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                             >
                            <input type="text" name="input"/>
                            <input type="hidden" name="flag" value="1"/>
                            </form>

                            <div class="form-group col-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-2" name="login"><strong>Login</strong></button>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="submit" class="btn btn-1 mt-2" value="Refresh Captcha">
                            </form>
                            
                        </div>
                        
                    
                    <!-- Captcha Form -->
                    
                    <?php
                    }
                    function  create_image()
                    {
                        global $image;
                        $image = imagecreatetruecolor(140, 50) or die("Cannot Initialize new GD image stream");

                        $background_color = imagecolorallocate($image, 255, 255, 255);
                        $text_color = imagecolorallocate($image, 0, 255, 255);
                        $pixel_color = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));

                        imagefilledrectangle($image, 0, 0, 140, 50, $background_color);

                        for ($i = 0; $i < 1000; $i++) {
                            imagesetpixel($image, rand() % 140, rand() % 50, $pixel_color);
                        }

                        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
                        $len = strlen($letters);
                        $letter = $letters[rand(0, $len - 1)];

                        $text_color = imagecolorallocate($image, 0, 0, 0);
                        $word = "";
                        for ($i = 0; $i < 5; $i++) {
                            $letter = $letters[rand(0, $len - 1)];
                            imagestring($image, 7, 5 + ($i * 30), 20, $letter, $text_color);
                            $word .= $letter;
                        }
                        $_SESSION['captcha_string'] = $word;

                        $images = glob("images/*.png");
                        foreach ($images as $image_to_delete) {
                            @unlink($image_to_delete);
                        }
                        imagepng($image, "images/image" . $_SESSION['count'] . ".png");
                    }
                    ?>
                    <p style="color:red;text-align:center;"><?php echo $error?></p>
                    <p style="color:red;text-align:center;"><?php echo $errorCaptcha?></p>

                    <!-- Captcha Form -->
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

