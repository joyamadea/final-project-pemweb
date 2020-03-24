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
		echo $name;
    }

	// Get all comments from database
	// $query="SELECT * FROM comment WHERE post_id='$post_id'";
	// // echo var_dump($query);
	// $resultComments=$db->query($query);
	// grab the comment that was submitted through Ajax call
	$comment_text = $_POST['comment_text'];
	$comm_id=uniqid('comment');
	// insert comment into database
	$sql = "INSERT INTO comment VALUES ('$comm_id','$name','$post_id', '$comment_text')";

	echo var_dump($sql);
	$result = $db->query($sql);
	// Query same comment from database to send back to be displayed
	// if insert was successful, get that same comment from the database and return it

	header("location: home.php");
	
}

?>

