<form>
	Input Message: <input type="text" name="txtMessage">
	<input type ="submit" value ="Submit">
</form>
<?php
	include 'DataProvider.php';
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

	mysqli_close($con);

?>