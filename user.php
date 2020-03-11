<?php
    include_once("config.php");

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        
        <div class="row justify-content-center">
            <img src="<?php echo $image;?>" width="100px"style="border-radius: 100px;margin:10px;">
        </div>
        <div class="row justify-content-center">
            <h3 style="text-align:center;"><?php echo $firstName." ".$lastName?></h3>
        </div>
        <div class="row justify-content-center">
            <p style="text-align:center;"><?php echo $email?><br>
                
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                <form action="add.php?username=<?php echo $username ?>" method="post" enctype="multipart/form-data">
                    <label>New Post</label>
                    <!-- <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" id="uploadFile " name="uploadFile">
                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    </div> -->
                    
                    
                    <input type="text" class="form-control mb-2" name="caption">
                    <input type="file" id="uploadFile " name="uploadFile">
                    <input type="submit" class="btn btn-primary mb-2" name='Submit' value="Post">
                </form>   
                </div>
            </div>   
        </div>

        <div class="row">
            
            <?php 
                $query2="SELECT * FROM post WHERE username='$username'";
                $result2=$db->query($query2) or die($db->error);
            
                while($row1=$result2->fetch_assoc()){
                    $caption=$row1['teks'];
                    $picture=$row1['gambar'];

                    echo "<div class='card'>";
                        
                        echo "<div class='card-body'>";
                            echo "<div class='card-title'>";
                                echo $username;
                            echo "</div>";  
                            echo "<img src='".$picture."'/ width='500px;'>";
                            echo "<p>".$caption."</p>";
                        echo "</div>";
                    echo "</div>";
                } 
            ?>
                    
        </div>
    
    </div>
    
</body>
</html>