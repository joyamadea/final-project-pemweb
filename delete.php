<?php
        include("config.php");

        $delete_id = $_GET['id'];
        $image = $_GET['image'];

        $query="DELETE FROM post WHERE post_id = '$delete_id'";
        $query2="DELETE FROM comment where post_id = '$delete_id'";
        mysqli_query($db, $query2) or die(mysqli_error($db));
        mysqli_query($db, $query) or die(mysqli_error($db));
        $path = "$image";
        unlink($path);
        header("Location: home.php");
    
?>

