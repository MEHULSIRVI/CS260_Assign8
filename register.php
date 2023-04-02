<?php
	// Connect to MySQL database
	$servername = "localhost";
	$username = "ravi";
	$password = "shantiniketan";
	$dbname = "dblab8";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Handle form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Sanitize and validate input data
		$first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
		$last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

		if ($password != $confirm_password) {
			echo "<p style='color:red'>Passwords do not match.</p>";
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<p style='color:red'>Invalid email format.</p>";
		}

		if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
			echo "<p style='color:red'>Password must be at least 8 characters long and contain at least one letter and one number.</p>";
		}

		// Hash password using bcrypt algorithm
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);

		// Insert user data into MySQL database
		$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";
		if (mysqli_query($conn, $sql)) {
			echo "<p style='color:green'>Registration successful.</p>";
			header("Location: login.html");

		} else {
			echo "<p style='color:red'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
		}
	}

	// Close MySQL database connection
	mysqli_close($conn);
?>
