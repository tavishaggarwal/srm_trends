<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Image Display</title>
</head>
<body>
	<h1> Images Display</h1>
</body>
</html>

<?php
include '../connection.php';

$user_id = 1;  // get from the login id (sessions)

		$query="SELECT * FROM `upload` WHERE `user_id` = $user_id";
		$run=mysqli_query($server,$query);
		$row=mysqli_fetch_assoc($run);
		$profile = $row['filename'];

echo "<a href='full_images.php?id=$user_id'><img src=images/{$row['filename']}></a>";

?>