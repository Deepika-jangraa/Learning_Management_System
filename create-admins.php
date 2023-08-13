<?php
require_once 'phpmysql.php'; // Include the database connection script

$hashedPassword1 = password_hash('password1', PASSWORD_DEFAULT);
$hashedPassword2 = password_hash('password2', PASSWORD_DEFAULT);

$sql = "INSERT INTO admins (username, password)
        VALUES
        ('admin1', '$hashedPassword1'),
        ('admin2', '$hashedPassword2')";

if ($conn->query($sql) === TRUE) {
    echo "Admin data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close(); // Close the database connection
?>
