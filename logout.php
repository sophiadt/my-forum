<!DOCTYPE html>
<html>
	<head>
		<title>Log Out</title>
	</head>
	<body>
		<?php
			session_start();
			session_destroy();
			
			echo "You are logged out.";
			echo "<br /><a href='login.html'>Forum Login Page</a>";
		?>
	</body>
</html>	