<?php
session_start(); // Start session

// Include the database connection script
require_once 'phpmysql.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check user credentials
    $userQuery = "SELECT * FROM users WHERE username='$username'";
    $userResult = $conn->query($userQuery);

    if ($userResult->num_rows == 1) {
        $userRow = $userResult->fetch_assoc();
        if (password_verify($password, $userRow['password'])) {
            // Set user data in session
            $_SESSION['user_id'] = $userRow['id'];
            $_SESSION['username'] = $userRow['username'];

            // Redirect to dashboard page
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close(); // Close the database connection
?>
