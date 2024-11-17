<?php
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login or landing page
header("Location: ../Home_page/index.php"); // Replace 'index.php' with your login/landing page
exit;
?>