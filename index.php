<form>
	Input Message: <input type="text" name="txtMessage">
	<input type ="submit" value ="Submit">
</form>
<?php
	include 'DataProvider.php';
	$db = connectToDatabase("localhost","day1","root","");

	if (!empty($_GET['txtMessage']) && $message = $_GET['txtMessage']) {
		insertMessageToDatabase($db, $message);
	}
	if (!empty($_GET['delete_message_id']) && $messageID = $_GET['delete_message_id']) {
		deleteMessageInDatabase($db,$messageID);
	}
	if ($db) {
		$result = $db->query('Select * from message');
		$result->execute();
		$result->setFetchMode(PDO::FETCH_BOTH);

		while($row = $result->fetch())
		{
			$message_id = $row['message_id'];
			$message_content = $row['message_content'];
			echo $message_id . " " . $message_content;
			echo " <a href='index.php?delete_message_id=".$message_id."'>Delete</a><br>";
		}
	}

?>