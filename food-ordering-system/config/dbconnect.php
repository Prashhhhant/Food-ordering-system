<?php 
	// connect to the database
	$conn = mysqli_connect('localhost', 'root', '', 'food_ordering');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	} else {
		// echo 'Connection successful.';
	}
?>