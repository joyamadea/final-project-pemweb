<?php
    include_once("config.php");
    include('functions.php');
    session_start();
    if($_SESSION['loggedin']==true){
        $name=$_SESSION['username'];
    }
    else{
        header("location: login.php");
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php?username=<?php echo $name?>">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        
        

        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                <form action="add.php?username=<?php echo $name ?>" method="post" enctype="multipart/form-data">
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

        <div class="row justify-content-center">
            
            <?php 
                $query2="SELECT * FROM post ORDER BY post_id DESC";
                $result2=$db->query($query2) or die($db->error);
            
                while($row1=$result2->fetch_assoc()){
                    $caption=$row1['teks'];
                    $picture=$row1['gambar'];
                    $post_id=$row1['post_id'];
                    $uname=$row1['username'];

                    echo "<div class='card mt-5 mb-3'>";
                        
                        echo "<div class='card-body'>";
                            echo "<div class='card-title'>";
                                echo "<a href='user.php?username=$uname'>".$uname."</a>";
                                if($uname==$name){
                                    echo "<button type='button' class='btn btn-danger float-right' data-toggle='modal' data-target='#delete'><i class='fa fa-trash'></i></button>";
                                }       
                                echo "</div>";                                  
                            echo "<img src='".$picture."'/ width='600px;' class='img-fluid'>";
                            echo "<p>".$caption."</p>";
                        echo "</div>";

                } 
            ?>
                            <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-3 comments-section">
                                    <form class="clearfix" action="home.php" method="post" id="comment_form">
                                        <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                                        <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
                                    </form>
                                <hr>
                                <!-- comments wrapper -->
                                <div id="comments-wrapper">
                                <?php if (isset($comments)): ?>
                                    <!-- Display comments -->
                                    <?php foreach ($comments as $comment): ?>
                                    <!-- comment -->
                                    <div class="comment clearfix">
                                        <img src="profile.png" alt="" class="profile_pic">
                                        <div class="comment-details">
                                            <span class="comment-name"><?php echo getUsernameById($comment['user_id']) ?></span>
                                            <span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
                                            <p><?php echo $comment['comment']; ?></p>
                                        </div>
                                    </div>
                                    <!-- // comment -->
                                    <?php endforeach ?>
                                <?php endif ?>
                                </div><!-- comments wrapper -->
                            </div><!-- // all comments -->        
                            </div>
                        </div>
                </div>            
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