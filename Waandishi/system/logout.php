<?php 
		
	session_start();

	include 'config.php';

	if(!isset($_SESSION["username"])) {
		header("Location: {$hostname} /waandishi/system");
	}
	
	session_unset();

	session_destroy();

	header("Location: {$hostname} /waandishi/system"); 

 ?>