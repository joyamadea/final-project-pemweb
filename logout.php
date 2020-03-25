<?php
    session_start();

    $_SESSION['loggedin']=false;
    $_SESSION['username']=null;
    session_destroy();

    header("location: login.php");
?>