<?php
    if(isset($_POST['Submit'])){

        $target_dir = "images/posts/";
        $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        
        $gambar=$target_file;
        $teks=htmlentities($_POST['caption']);
        $username=$_GET['username'];
        $post_id=uniqid('post');
         

        include_once("config.php");
    
        $query = "INSERT INTO post VALUES('$post_id','$username','$teks','$gambar')";
        $result = $db->query($query);
        
        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$target_file)){
            //
        }
        else{
            //echo "hello";
        }
        
        header("Location: user.php?username=$username");
        
    }


?>