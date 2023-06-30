<?php  // php for logout
session_start();
if (isset($_SESSION['user_name'])) {
    // Perform any additional logout-related actions if needed
    // Destroy the session and unset all session variables
    session_destroy();
}
    // Redirect the user to the login page or any other desired page
    header("Location: ../loginpage.php");
    exit();

?>