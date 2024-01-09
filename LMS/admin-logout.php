<?php
session_start(); // Start session

// Destroy the admin's session
session_destroy();

// Redirect to admin login page after logout
header("Location: admin-login.html");
exit();
?>
