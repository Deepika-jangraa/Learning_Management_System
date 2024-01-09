<?php
session_start(); // Start session

require_once 'phpmysql.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION["user_id"]; // Assuming you store user ID in session

    $file = $_FILES["file"];
    $filename = $file["name"];
    $tmpFilePath = $file["tmp_name"];

    // Move the uploaded file to a directory (adjust the path as needed)
    $uploadPath = "uploaded_files/" . $filename;
    move_uploaded_file($tmpFilePath, $uploadPath);

    // Insert the upload data into the uploads table
    $insertQuery = "INSERT INTO uploaded_files (user_id, filename)
                    VALUES ('$userId', '$filename')";
    if ($conn->query($insertQuery) === TRUE) {
        $_SESSION['upload_result'] = "File uploaded successfully!";
    } else {
        $_SESSION['upload_result'] = "Error uploading file.";
    }

    // Redirect back to the upload page
    header("Location: upload.html");
    exit();
}

$conn->close(); // Close the database connection
?>
