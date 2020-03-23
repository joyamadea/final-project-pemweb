<?php
    if(isset($_POST['Submit'])){
        include_once("config.php");

        $target_dir = "images/posts/";
        $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        
        $gambar=$target_file;
        $teks=htmlentities($_POST['caption']);
        $username=$_GET['username'];
        $post_id=uniqid('post');
         
        if(empty($teks)){
            $query = "INSERT INTO post VALUES('$post_id','$username',null,'$gambar')";
        }
        else{
            $query = "INSERT INTO post VALUES('$post_id','$username','$teks','$gambar')";
        }

        $result = $db->query($query);
        echo var_dump($query);
        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$target_file)){
            //
        }
        else{
            //echo "hello";
        }
        
        header("Location: home.php");
        
    }


?>