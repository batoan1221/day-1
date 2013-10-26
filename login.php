<h1>Login Page</h1>
<form>
Username: <input type="text" name="txtUsername"> <br>
Password: <input type="password" name="txtPassword"> <br>
<input type="submit" name="btnSubmit" value="Log in">
<input type="reset" name="btnReset" value="Clear">
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

	$con = connectToDatabase("localhost","day1","root","");

	if (!empty($_GET['txtUsername']) && !empty($_GET['txtPassword']))
	{
		$txtUsername = $_GET['txtUsername'];
		$txtPassword = $_GET['txtPassword'];
		if ($con) {
			$result = mysqli_query($con,"Select * from user where username ='".$txtUsername."' and password ='".$txtPassword."'");
			$row = mysqli_fetch_array($result);
			if (!empty($row))
			{
				header('Location: index.php?txtUsername='.$txtUsername);
			}
			else
			{
				echo "Not OK!";
			}
		}
	}

	mysqli_close($con);

?>