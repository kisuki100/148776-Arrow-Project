<?php 
	
	session_start();

	include 'config.php';

	if(!isset($_SESSION["username"])) {
		header("Location: {$hostname} /waandishi/system");
	}

	if($_SESSION["role"] != 1) {
    	header("Location: {$hostname} /waandishi/system/post.php");
  	}
	
	$userId = $_GET['id'];

	$deleteSql = "DELETE FROM user WHERE user_id = '{$userId}'";

	$deleteResult = mysqli_query($conn,$deleteSql);

	if($deleteResult) {
		header("Location: {$hostname} /waandishi/system/users.php");
	} else {
		die("Error: ".$deleteSql."<br/>".mysqli_error($conn));
	}

	mysqli_close($conn);
 ?>