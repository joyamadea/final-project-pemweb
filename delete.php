<?php
        include("config.php");

        $delete_id = $_GET['idofpost'];
        $username=$_GET['userofpost'];

        echo $delete_id;
        echo $username;

        mysqli_query($db, "DELETE FROM post where post_id = '$delete_id'") or die(mysqli_error());
        header("Location: user.php?username=$username");
    
?>

