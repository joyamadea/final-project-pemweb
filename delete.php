<?php
        include("config.php");

        $delete_id = $_GET['idofpost'];

        // echo $delete_id;
        // echo $username;
        $query="DELETE FROM post WHERE post_id = '$delete_id'";
        echo var_dump($query);
        mysqli_query($db, $query) or die(mysqli_error());
        
        //header("Location: home.php");
    
?>

