<?php
session_start(); // Start session

require_once 'phpmysql.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION["user_id"]; // Assuming you store user ID in session
    $recipient = $_POST["recipient"];
    $message = $_POST["message"];

    // Insert the message data into the messages table
    $insertQuery = "INSERT INTO messages (user_id, recipient, message)
                    VALUES ('$userId', '$recipient', '$message')";
    if ($conn->query($insertQuery) === TRUE) {
        $_SESSION['message_result'] = "Message sent successfully!";
    } else {
        $_SESSION['message_result'] = "Error sending message.";
    }

    // Redirect back to the communication page
    header("Location: communication.html");
    exit();
}

$conn->close(); // Close the database connection
?>
