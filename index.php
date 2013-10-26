<form>
	Input Message: <input type="text" name="txtMessage">
	<input type ="submit" value ="Submit">
</form>
<?php
	function connectToDatabase( $hostName, $databaseName, $username, $password)
	{
		// Create connection
		$con=mysqli_connect($hostName, $username, $password, $databaseName);

		// Check connection
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else
		{
			// echo "Connect successfully";
		}

		return $con;
	};
	
	function insertMessageToDatabase($con, $message)
	{
		mysqli_query($con, "INSERT INTO message (message_content) VALUES ('".$message."')");
	}
	
	$con = connectToDatabase("localhost","day1","root","");

	if (!empty($_GET['txtMessage']) && $message = $_GET['txtMessage']) {
		insertMessageToDatabase($con, $message);
	}
	
	if ($con) {
		$result = mysqli_query($con,"Select * from message");
		while($row = mysqli_fetch_array($result))
		{
			echo $row['message_id'] . " " . $row['message_content'];
			echo "<br>";
		}
	}

	mysqli_close($con);

?>