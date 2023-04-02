session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
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
	<title>Update Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    h1 {
      text-align: center;
    }
    form {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);
    }
    label {
      display: inline-block;
      margin-bottom: 10px;
    }
    input[type="email"],
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
	<h1>Update Information</h1>
	<form action="update.php" method="POST">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo $user_email; ?>"><br>
		<label for="fname">First Name:</label>
		<input type="text" id="fname" name="fname" value="<?php echo $user_first_name; ?>"><br>
		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lname" value="<?php echo $user_last_name; ?>"><br>
		<label for="old_password">Old Password:</label>
		<input type="password" id="old_password" name="old_password"><br>
		<label for="new_password">New Password:</label>
		<input type="password" id="new_password" name="new_password"><br>
		<label for="confirm_password">Confirm New Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br>
		<input type="submit" value="Update">
	</form>
</body>
</html>
