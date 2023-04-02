<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not, redirect to the login page with an error message
    $_SESSION['error'] = "You are not logged in!";
    header("Location: login.php");
    exit();
}

// Check if the user has clicked the logout button
if (isset($_POST['logout'])) {
    // If yes, destroy the session and redirect to the login page with a success message
    session_destroy();
    $_SESSION['success'] = "You have been logged out!";
    // $_SESSION['success'] = "You have been logged out!";
    header("Location: login.php");
    exit();
}

// If the user visits this script directly, show an error message
$_SESSION['error'] = "Invalid request!";
header("Location: login.html");
exit();
