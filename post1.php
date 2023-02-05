<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forum Post Page</title>
	</head>
	<body>
		<?php
			require_once("../../mysql.php");

			$threadid = $_GET['threadid'];
			$query	= "SELECT * FROM forumThread WHERE threadId = '$threadid'";
			$stmt	= $db ->  prepare ($query);
			$stmt->execute();
			
			if(isset($_SESSION['user']))
			{
				echo "<a href='threads.php'>Forum Threads Page</a><br />";
				echo "<a href='createThread1.php'>Create a Thread</a>";
				echo
				"<form method='post' action='logout.php'>
					<input type='submit' value='Log Out' />
				</form>";
				echo "<br />";
			}
			else
			{
				echo "<a href='threads.php'>Forum Threads Page</a>";
				echo
				"<form method='post' action='login.html'>
					<input type='submit' value='Login' />
				</form><br />";
			}
			
			
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$username	= $row['username'];
				$title	= $row['title'];
				$description= $row['description'];
				$date		= $row['createdOn'];
				
				echo
					"<table border='1'>
						<tr>
							<td>Posted by $username</td>
						</tr>
						<tr>
							<th>$title</th>
						</tr>
						<tr>
							<td>$description</td>
						</tr>
						<tr>
							<td>Created On $date</td>
						 </tr>
					</table><br />";
			}
			
			echo 
				"<table border='1'>
					<tr>
						<th>Replies</th>
						<th>Username</th>
						<th>Created On</th>
					</tr>";
				$query	= "SELECT * FROM forumPost WHERE threadId = '$threadid'";
				$stmt	= $db ->  prepare ($query);
				$stmt->execute();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$reply		= $row['userResponse'];
					$username	= $row['username'];
					$date		= $row['createdON'];

					echo "<tr>
							<td>$reply</td>
							<td>$username</td>
							<td>$date</td>
						 </tr>";
				}
			echo "</table>";
			
			echo
				"<form method='post' action='post2.php?threadid=$threadid'>
					<br />
					<input type='text' name='txtReply'/><br />
					<input type='submit' value='Reply' />
				</form>";
			?>
	</body>
</html>