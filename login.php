<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forum Login Check</title>
	</head>
	<body>
		<h1>Forum Login Check</h1>
		<?php
			require_once("../../mysql.php");
			
			$username	= $_POST['Username'];
			$password	= $_POST['Password'];
			
			$query	= "SELECT password FROM forumUsers WHERE username = '$username' && password= '$password'";
			$stmt	= $db ->  prepare ($query);
			$stmt->execute();
			
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$datapassword	= $row['password'];
			}
			
			if($datapassword == $password)
			{
				$_SESSION['user'] = $username;
				echo "Welcome.<br />You are logged in.";
				echo "<br /><a href='createThread1.php'>Create a Thread</a>";
				echo "<br /><a href='threads.php'>Forum Threads Page</a>";
				echo
				"<form method='post' action='logout.php'>
					<input type='submit' value='Log Out' />
				</form>";
			}
			else
			{
				echo "Sorry. Your password was incorrect. Please try again.";
				echo "<br /><a href='login.html'>Login</a><br />";
			}
			
			$stmt	= $db ->  prepare ($query);
			$stmt->bindParam(":username", $username);
			$stmt->bindParam(":password", $password);
			$stmt->execute();  
		?>
	</body>
</html>	