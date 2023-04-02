<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
  // Retrieve the form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to the MySQL database
  $db_host = "localhost";
  $db_name = "dblab8";
  $db_user = "ravi";
  $db_pass = "shantiniketan";
  $db_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  // Check if the email exists in the users table
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($db_conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    // Retrieve the user's password hash
    $user = mysqli_fetch_assoc($result);
    $hash = $user['password'];

    // Verify the password
    if (password_verify($password, $hash)) {
      // Set session variables for the user
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_email'] = $user['email'];
      $_SESSION['user_first_name'] = $user['first_name'];
      $_SESSION['user_last_name'] = $user['last_name'];

      // Redirect to the welcome page
      header("Location: welcome.php");
      exit();
    } else {
      // Display error message for incorrect password
      echo "<div style='color: red; font-weight: bold;'>Password is incorrect.</div>";
    }
  } else {
    // Display error message for invalid email
    echo "<div style='color: red; font-weight: bold;'>Invalid email. Please try again.</div>";
    
  }

  // Close the database connection
  mysqli_close($db_conn);
}
?>
