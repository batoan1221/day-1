<?php
	// Create connection
	$con=mysqli_connect("localhost","root","","day1");

	// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		echo "Connect successfully";
	}
?>