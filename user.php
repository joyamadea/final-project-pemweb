<?php
    include_once("config.php");

    session_start();

    $sessionname=$_SESSION['username'];
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
   
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> -->
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home </a>
            </li>
            <?php 
                if($sessionname==$username){
                    ?>
                <li class="nav-item  active">
                    <a class="nav-link" href="#">Profile<span class="sr-only">(current)</span></a>
                </li>
            <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <?php
                }
            ?>
            
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        
        <div class="row mt-5 justify-content-center">
                <img src="<?php if(empty($image)){ echo "images/profile/profile.png";}else{echo $image; }?>" style="
                width:100px;
                height:100px;
                object-fit:cover;
                border-radius: 100px;
                margin:10px; 
                text-align:right;">
        </div>
        <div class="row justify-content-center">
            <h3 style="text-align:center;"><?php echo $firstName." ".$lastName?></h3><br/>
        </div>
        <div class="row justify-content-center">
            <p style="text-align:center;"><?php echo $email;?><br/>
             <?php echo $bio;?><br/>
            <?php 
                if($sessionname==$username){
                    echo "<a href='edit.php?username=".$username."'>Edit Profile</a></p>";     
                }
            ?>
            
        </div>

        <?php 
            if($sessionname==$username){
                
        ?>    
            <div class="row justify-content-center">
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
        <?php
            }
        ?>
       

        <div class="row justify-content-center">
            
            <?php 
                $query2="SELECT * FROM post WHERE username='$username' ORDER BY post_id DESC";
                $result2=$db->query($query2) or die($db->error);
            
                while($row1=$result2->fetch_assoc()){
                    $caption=$row1['teks'];
                    $picture=$row1['gambar'];
                    $post_id=$row1['post_id'];
                    $uname=$row1['username'];

                    echo "<div class='card mt-5 mb-3'>";
                        
                        echo "<div class='card-body'>";
                        echo "<div class='card-title'>";
                        echo "<img style='width:50px;
                        height:50px;
                        object-fit:cover;
                        border-radius: 100px;
                        margin-right:13px;' src='";
                        if(empty($image)){ 
                            echo "images/profile/profile.png";}
                            else{echo $image; };
                            echo "'>";
                        echo "<a href='user.php?username=$uname'>".$uname."</a>";
                                if($uname==$sessionname){
                                    echo "<a class='btn btn-danger float-right' href='delete.php?id=".$row1['post_id']."&image=".$row1['gambar']."' 
                            onclick='return confirm(\"Are you sure you want to delete this post?\")'><i class='fa fa-trash'></i></a></td>";
                                    //echo "<button type='button' class='btn btn-danger float-right' data-toggle='modal' data-target='#delete'><i class='fa fa-trash'></i></button>";
                                } 
                                echo "</div>";                                  
                            echo "<img src='".$picture."'/ width='600px;' class='img-fluid'>";
                            echo "<p class='mt-3'>".$caption."</p>";
                        echo "</div>";
                        echo "<ul class='list-group list-group-flush'>";
                        echo "<li class='list-group-item'>";
                                    echo "<form class='clearfix' action='comment.php?post_id=".$post_id."' method='post' id='comment_form'>
                                    <div class='row'>
                                    <div class='col'>
                                        <textarea name='comment_text' id='comment_text' class='form-control' rows='1'></textarea>
                                    </div>
                                    <div class='col-3'>
                                        <button class='btn btn-primary' name='submit_comment'>Comment</button>
                                    </div>
                                    </div>
                                    
                                    
                                    </form>";
                                echo "</li>";
                                
                                $query3="SELECT * FROM comment WHERE post_id='$post_id' ORDER BY comm_id";
                                $result3=$db->query($query3) or die($db->error);

                                while($row2=$result3->fetch_assoc()){
                                    $commentUN=$row2['username'];
                                    $comments=$row2['comment'];
                                    
                                    echo "<li class='list-group-item' id='comments-wrapper'>";
                                        echo "<a href='user.php?username=$commentUN'>".$commentUN."</a> ";
                                        echo $comments;
                                    echo "</li>";
                                }
                    echo "</div>";
                } 
            ?>
                    
        </div>
    
    </div>
    


<div class="modal" id="delete" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Delete Post</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="delete.php">
                    <input type="hidden" name="idofpost" value="<?php echo $post_id; ?>">  
                    <input type="hidden" name="userofpost" value="<?php echo $username; ?>">  
                <div class="alert alert-danger">Are you sure you want delete this post?</div>
            </div>    
            <div class="modal-footer">
                
                <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>

        </div>
    </div>
</div>


</body>
</html>