<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forum Reply Save</title>
	</head>
	<body>
		<?php
			require_once("../../mysql.php");
			
			$threadid 		= $_GET['threadid'];
			$reply			= $_POST['txtReply'];
			$user			= $_SESSION['user'];
			
			if(isset($_SESSION['user']))
			{
				$query	= "INSERT INTO forumPost(threadID, username, userResponse) VALUES ('$threadid', '$user', '$reply')";
				$stmt	= $db ->  prepare ($query);
				$stmt->bindParam(":reply", $reply);
				$stmt->bindParam(":user", $user);
				$stmt->bindParam(":threadid", $threadid);
				$stmt->execute();
				echo "Replied.";
				echo "<br /><a href='post1.php?threadid=$threadid'>Go Back to Previous Post</a>";
				echo "<br /><a href='threads.php'>Forum Threads Page</a>";
			}
			else
			{
				echo "Sorry. You cannot reply if you are not logged in.";
				echo
				"<form method='post' action='login.html'>
					<input type='submit' value='Login' />
				</form><br />";
			}
		?>
	</body>
</html>	