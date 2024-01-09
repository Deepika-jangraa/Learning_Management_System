<?php
session_start(); // Start session

require_once 'phpmysql.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check admin credentials
    $adminQuery = "SELECT * FROM admins WHERE username='$username'";
    $adminResult = $conn->query($adminQuery);

    if ($adminResult->num_rows == 1) {
        $adminRow = $adminResult->fetch_assoc();
        if (password_verify($password, $adminRow['password'])) {
            // Set admin data in session
            $_SESSION['admin_id'] = $adminRow['id'];
            $_SESSION['admin_username'] = $adminRow['username'];

            // Redirect to admin dashboard page
            header("Location: admin-dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Admin not found.";
    }
}

$conn->close(); // Close the database connection
?>
