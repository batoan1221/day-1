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
	if (!empty($_GET['delete_message_id']) && $messageID = $_GET['delete_message_id']) {
		deleteMessageInDatabase($con,$messageID);
	}
	if ($con) {
		$result = mysqli_query($con,"Select * from message");
		while($row = mysqli_fetch_array($result))
		{
			$message_id = $row['message_id'];
			$message_content = $row['message_content'];
			echo $message_id . " " . $message_content;
			echo " <a href='index.php?delete_message_id=".$message_id."'>Delete</a><br>";
		}
	}

	function deleteMessageInDatabase($con, $messageID)
	{
		mysqli_query($con,"DELETE FROM message WHERE message_id = '".$messageID."'");
	}
	
	// deleteMessageInDatabase($con,"4");
	mysqli_close($con);

?>