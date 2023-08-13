<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once 'phpmysql.php'; // Include the database connection script

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hashed password

        // Check if username or email already exists
        $existingUserQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $existingUserResult = $conn->query($existingUserQuery);

        if ($existingUserResult->num_rows > 0) {
            echo "Username or email already exists. Please choose a different one.";
        } else {
            // Insert user data into the users table
            $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            
            if ($conn->query($insertQuery) === TRUE) {
                echo "Registration successful! Redirecting to login page...";
                header("Refresh: 3; url=login.html"); // Redirect after 3 seconds
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }

        $conn->close(); // Close the database connection
    }
    ?>
