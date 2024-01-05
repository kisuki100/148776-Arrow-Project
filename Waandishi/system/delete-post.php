<?php 

	include 'config.php';

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		header("Location: {$hostname} /waandishi/system/post.php");
	}

	$selectSql = "SELECT * FROM post WHERE post_id = {$id}";

	$selectResult = mysqli_query($conn,$selectSql);

	$row = mysqli_fetch_assoc($selectResult);

	unlink("upload/".$row['post_img']);

	$deleteSql = "DELETE FROM post WHERE post_id = {$id};";

	$deleteResult = mysqli_multi_query($conn,$deleteSql);

	if($deleteResult) {
		header("Location: {$hostname} /waandishi/system/post.php");	
	} else {
		die("ERROR: ".$deleteSql."<br/>".mysqli_error($conn));
	}

	
 ?>