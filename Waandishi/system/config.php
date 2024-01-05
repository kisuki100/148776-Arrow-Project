<?php 

	$hostname = "http://localhost/Waandishi";

	$conn = mysqli_connect('localhost','root','','waandishi');

    if(!$conn) {
      die("Connection Failure: ".mysqli_connect_error());
    }

 ?>