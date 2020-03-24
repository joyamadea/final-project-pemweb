<?php 
	// Set logged in user id: This is just a simulation of user login. We haven't implemented user log in
	// But we will assume that when a user logs in, 
	// they are assigned an id in the session variable to identify them across pages
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "customer");
	// get post with id 1 from database
	$post_query_result = mysqli_query($db, "SELECT * FROM post WHERE post_id = 'post5e676c' ");
	$post = mysqli_fetch_assoc($post_query_result);

	// Get all comments from database
	$comments_query_result = mysqli_query($db, "SELECT * FROM comment WHERE post_id=" . $post['post_id'] . " ORDER BY created_at DESC");
	$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);

	// Receives a user id and returns the username
	function getUsernameById($name)
	{
		global $db;
		$result = mysqli_query($db, "SELECT username FROM users WHERE username=" . $name . " LIMIT 1");
		// return the username
		return mysqli_fetch_assoc($result)['username'];
	}

	// Receives a post id and returns the total number of comments on that post
	// function getCommentsCountByPostId($post_id)
	// {
	// 	global $db;
	// 	$result = mysqli_query($db, "SELECT COUNT(*) AS total FROM comment");
	// 	$data = mysqli_fetch_assoc($result);
	// 	return $data['total'];
	// }

	// If the user clicked submit on comment form...
if (isset($_POST['comment_posted'])) {
	global $db;
	// grab the comment that was submitted through Ajax call
	$comment_text = $_POST['comment_text'];
	// insert comment into database
	$sql = "INSERT INTO comments (post_id, username, body) VALUES (1, " . $name . ", '$comment_text')";
	$result = mysqli_query($db, $sql);
	// Query same comment from database to send back to be displayed
	$inserted_id = $db->insert_id;
	$res = mysqli_query($db, "SELECT * FROM comments WHERE id=$inserted_id");
	$inserted_comment = mysqli_fetch_assoc($res);
	// if insert was successful, get that same comment from the database and return it
	if ($result) {
		$comment = "<div class='comment clearfix'>
					<img src='profile.png' alt='' class='profile_pic'>
					<div class='comment-details'>
						<span class='comment-name'>" . getUsernameById($inserted_comment['username']) . "</span>
						<p>" . $inserted_comment['body'] . "</p>
					</div>
				</div>";
		$comment_info = array(
			'comment' => $comment,
			// 'comments_count' => getCommentsCountByPostId(1)
		);
		echo json_encode($comment_info);
		exit();
	} else {
		echo "error";
		exit();
	}
}

?>