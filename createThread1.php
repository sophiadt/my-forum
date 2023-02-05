<!DOCTYPE html>
<html>
	<head>
		<title>Forum Thread Page</title>
	</head>
	<body>
		<h1>Post a Thread</h1>
		
		<a href='threads.php'>Forum Threads Page</a><br /><br />
		
		<form method='post' action='createThread2.php'>
			Title<br />
			<input type='text' name='Title' required=''/><br /><br />
			Description<br />
			<input type='text' name='Description' required=''/><br /><br />
			<input type='submit' value='Post' />
		</form>
	</body>
</html>