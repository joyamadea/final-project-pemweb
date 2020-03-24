<?php 
	include_once("config.php");
	// get post with id 1 from database
	// $post_query_result = mysqli_query($db, "SELECT * FROM post WHERE post_id = 'post5e78a2c77b723' ");
	// $post = mysqli_fetch_assoc($post_query_result);
	


	// If the user clicked submit on comment form...
if (isset($_POST['submit_comment'])) {
	$post_id=$_GET['post_id'];
	session_start();
	if($_SESSION['loggedin']==true){
		$name=$_SESSION['username'];
    }

    $comment_text = $_POST['comment_text'];
    
    if(!empty($comment_text)){
        $comm_id=uniqid('comment');
        $sql = "INSERT INTO comment VALUES ('$comm_id','$name','$post_id', '$comment_text')";

        $result = $db->query($sql);
    }
	
	

	header("location: home.php");
	
}

?>

