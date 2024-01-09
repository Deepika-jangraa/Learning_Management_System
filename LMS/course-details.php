<?php
session_start(); // Start session

require_once 'phpmysql.php'; // Include the database connection script

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    // Fetch course details from the database
    $query = "SELECT * FROM courses WHERE id='$courseId'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $course = $result->fetch_assoc();
    } else {
        echo "Course not found.";
        exit();
    }
} else {
    echo "Invalid course ID.";
    exit();
}

$conn->close(); // Close the database connection
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>E-Learning Platform</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="course.html">Courses</a></li>
                <li><a href="signup.html">Sign Up</a></li>
                <li><a href="login.html">Log In</a></li>
                <li><a href="communication.html">Communication</a></li>
                
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Course Details Section -->
        <section class="course-details">
            <h2>Course Title</h2>
            <p>Course description goes here...</p>

            <h1><?php echo $course['title']; ?></h1>
    <p>Description: <?php echo $course['description']; ?></p>
    <p>User_id: <?php echo $course['user_id']; ?></p>
    <a href="assessments.html">Start Assessment</a>
    <!-- Add more course details and options as needed -->
<br><br>
            <button id="enrollButton">Enroll in Course</button>
        </section>
        <!-- Related Courses Section -->
        <section class="related-courses">
            <h2>Related Courses</h2>
            <ul>
                <li>Related Course 1</li>
                <li>Related Course 2</li>
                <!-- Add more related courses -->
            </ul>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 E-Learning Platform. All rights reserved.</p>
    </footer>

    <!-- JavaScript files -->
    <script src="script.js"></script>
</body>
</html>
