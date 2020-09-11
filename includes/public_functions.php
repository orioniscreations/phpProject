<?php
 
// returns published posts

function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}

/*Returns all posts under a type*/
function getPublishedPostsByTopic($type_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_type pt 
				WHERE pt.type_id=$type_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['type'] = getPostType($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}
/* * * * * * * * * * * * * * * *
* Returns type name by type id
* * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT 'type' FROM types WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$type = mysqli_fetch_assoc($result);
	return $type['type'];
}

function getPost($post_id){
	global $conn;
	
	$sql = "SELECT * FROM posts WHERE id='$post_id' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the types to which this post belongs
		$post['type'] = getTopicNameById($post['type_id']);
	}
	return $post;
}
/* Returns all types */
function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM types";
	$result = mysqli_query($conn, $sql);
	$type = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $type;
}
?>