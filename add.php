<?php
    if(isset($_POST['Submit'])){
        include_once("config.php");

        $target_dir = "images/posts/";
        $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        $name=$_GET['username'];
        $gambar=$target_file;
        $teks=htmlentities($_POST['caption']);
        $post_id=uniqid('post');
        $uploadOk=1;
         
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ){
            $uploadOk=0;
        }

        if(empty($teks)&&$uploadOk==1){
            $query = "INSERT INTO post VALUES('$post_id','$name',null,'$gambar')";
            move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$target_file);
            $result = $db->query($query);
        }
        else if($uploadOk==1){
            $query = "INSERT INTO post VALUES('$post_id','$name','$teks','$gambar')";
            move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$target_file);
            $result = $db->query($query);
        }


        
        header("Location: home.php");
        
    }
    if(isset($_POST['edit'])){
        include_once("config.php");

        $target_dir = "images/profile/";
        $target_file = $target_dir . basename($_FILES["uploadFile1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $uploadOk=1;
        $bio=$_POST['bio'];
        $username=$_GET['username'];

        $query2="SELECT * FROM users WHERE username='$username'";
        $result2=$db->query($query2);
        //echo var_dump($query2);
        $res=$result2->fetch_assoc();
        
        $prevImage=$res['profile_pic'];

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ){
            $uploadOk=0;
        }

        if(isset($bio) && $target_file!=$target_dir &&$uploadOk==1){
            
            unlink($prevImage);
            $query = "UPDATE users SET profile_pic='$target_file', bio='$bio' WHERE username='$username'";
            move_uploaded_file($_FILES["uploadFile1"]["tmp_name"],$target_file);
            $result = $db->query($query);
        }
        else if(isset($bio) &&$uploadOk==1){
            unlink($prevImage);
            $query = "UPDATE users SET bio='$bio' WHERE username='$username'";
            $result = $db->query($query);
        }
        else if(isset($_FILES["uploadFile1"]["name"])&&$uploadOk==1){
            $query = "UPDATE users SET profile_pic='$target_file' WHERE username='$username'";
            move_uploaded_file($_FILES["uploadFile1"]["tmp_name"],$target_file);
            $result = $db->query($query);
        }

        
       header("Location: user.php?username=$username");
        
    }


?>