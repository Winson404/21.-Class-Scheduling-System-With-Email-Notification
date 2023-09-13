<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","class_scheduling");
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>