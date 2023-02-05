<!DOCTYPE html>
<html>
	<head>
		<title>Forum Registration Check</title>
	</head>
	<body>
		<h1>Forum Registration Check</h1>
		<?php
			require_once("../../mysql.php");
			
			$firstname	= $_POST['txtFirstName'];
			$lastname	= $_POST['txtLastName'];
			$birthday	= $_POST['dateBirthday'];
			$username	= $_POST['txtUsername'];
			$password	= $_POST['Password'];
			
			$query	= "SELECT username FROM forumUsers WHERE username= '$username'";
			$stmt	= $db ->  prepare ($query);
			$stmt->execute();
			
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$datausername	= $row['username'];
			}
			
			if($datausername == $username)
			{
				echo "Sorry, this username is taken. Please make a new one.";
				echo "<br /><a href='register.php'>Register</a>";
			}
			else
			{
				$query	= "INSERT INTO forumUsers(firstName, lastName, birthDate, username, password) VALUES (:firstname, :lastname, :birthday, :username, :password)";
				echo "You are registered.";
				echo
				"<form method='post' action='login.html'>
					<input type='submit' value='Login' />
				</form><br />";
			}
			
			$stmt	= $db ->  prepare ($query);
			$stmt->bindParam(":firstname", $firstname);
			$stmt->bindParam(":lastname", $lastname);
			$stmt->bindParam(":birthday", $birthday);
			$stmt->bindParam(":username", $username);
			$stmt->bindParam(":password", $password);
			$stmt->execute();
		?>
	</body>
</html>	