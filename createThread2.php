<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forum Thread Save</title>
	</head>
	<body>
		<?php
			require_once("../../mysql.php");
			
			$title			= $_POST['Title'];
			$description	= $_POST['Description'];
			$user			= $_SESSION['user'];
			
			if(isset($_SESSION['user']))
			{
				$query	= "INSERT INTO forumThread(username, title, description) VALUES ('$user', '$title', '$description')";
				$stmt	= $db ->  prepare ($query);
				$stmt->bindParam(":title", $title);
				$stmt->bindParam(":description", $description);
				$stmt->bindParam(":user", $user);
				$stmt->execute();
				echo "Posted";
				echo "<br /><a href='threads.php'>Forum Threads Page</a>";
				echo "<br /><a href='createThread1.php'>Create Another Thread</a>";
			}
			else
			{
				echo "Sorry. You cannot post if you are not logged in.";
				echo
				"<form method='post' action='login.html'>
					<input type='submit' value='Login' />
				</form><br />";
			}
		?>
	</body>
</html>	