<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forum Threads Page</title>
	</head>
	<body>
		<h1>Forum Threads</h1>
		
		<?php
			require_once("../../mysql.php");

			$query	= "SELECT * FROM forumThread ORDER BY createdOn DESC";
			$stmt	= $db ->  prepare ($query);
			$stmt->execute();
			
			if(isset($_SESSION['user']))
			{
				echo "<a href='createThread1.php'>Create a Thread</a>";
				echo
				"<form method='post' action='logout.php'>
					<input type='submit' value='Log Out' />
				</form>";
				echo "<br />";
			}
			else
			{
				echo
				"<form method='post' action='login.html'>
					<input type='submit' value='Login' />
				</form><br />";
			}
			
			echo "<table border='1'>
					<tr>
						<th>Username</th>
						<th>Title</th>
						<th>Description</th>
						<th>Created On</th>
					</tr>";
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$username	= $row['username'];
				$date		= $row['createdOn'];
				$title		= $row['title'];
				$description= $row['description'];
				$threadid	= $row['threadID'];

				echo "<tr>
					<td>$username</td>
					<td><a href='post1.php?threadid=$threadid'>$title</a></td>
					<td>$description</td>
					<td>$date</td>
					</tr>";
			}
			echo "</table>";
		?>
	</body>
</html>	