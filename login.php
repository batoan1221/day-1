<h1>Login Page</h1>
<form>
Username: <input type="text" name="txtUsername"> <br>
Password: <input type="password" name="txtPassword"> <br>
<input type="submit" name="btnSubmit" value="Log in">
<input type="reset" name="btnReset" value="Clear">
</form>
<?php 
	include 'DataProvider.php';
	$db = connectToDatabase("localhost","day1","root","");

	if (!empty($_GET['txtUsername']) && !empty($_GET['txtPassword']))
	{
		$txtUsername = $_GET['txtUsername'];
		$txtPassword = $_GET['txtPassword'];
		if ($db) {
			$result = $db->query("Select * from user where username ='".$txtUsername."' and password ='".$txtPassword."'");
			$result->execute();
			$result->setFetchMode(PDO::FETCH_BOTH);
			$row = $result->fetch();
			// $result = mysqli_query($con,"Select * from user where username ='".$txtUsername."' and password ='".$txtPassword."'");
			// $row = mysqli_fetch_array($result);
			if (!empty($row))
			{
				header('Location: index.php?txtUsername='.$txtUsername);
			}
			else
			{
				echo "Not OK!";
				echo $txtUsername;
				echo $txtPassword;
			}
		}
	}
	closeConnection($db);
?>