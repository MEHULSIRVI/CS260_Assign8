<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  echo "<p>You are not logged in. Please <a href='login.html'>log in</a> to access this page.</p>";
  exit();
}

// Retrieve user data from session
$user_email = $_SESSION['user_email'];
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
    <style>
        body {
			display: block;
			margin-bottom: 8px;
			color: #555555;
			font-size: 14px;
			text-align: left;
		}
    </style>
</head>
<body>
	<h1>Welcome <?php echo $user_first_name . ' ' . $user_last_name; ?>!</h1>
	<p>Email: <?php echo $user_email; ?></p>
	<form action="delete.php" method="post">
		<input type="submit" name="delete" value="Delete Account">
	</form>
	<button onclick="location.href='update_info.php'">Update</button>
	<button onclick="location.href='logout.php'">Logout</button>
</body>
</html>