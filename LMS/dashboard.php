<?php
session_start(); // Start session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
                <li><a href="communication.html">Communication</a></li>
                <li><a href="upload.html">Upload Documents</a></li>
            </ul>
        </nav>
    </header>

    <h1>Welcome to the Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    <!-- Your dashboard content here -->
    

    <!-- Main Content -->
    <main>
        <!-- User Dashboard Section -->
        <section class="user-dashboard">
            <h2>Welcome to Your Dashboard</h2>
            <div class="enrolled-courses">
                <h3>Enrolled Courses</h3>
                <ul>
        <li><a href="course-details.php?id=3">Course 1</a></li> <!-- Replace with actual course ID -->
        <li><a href="course-details.php?id=4">Course 2</a></li> <!-- Replace with actual course ID -->
        <!-- Add more course links as needed -->
    </ul>
            </div>
        
            <div class="communication-options">
                <h3>Communication Options</h3>
                <p>Contact the instructor or other learners</p>
            </div>
        </section>
    </main>

    <a href="logout.php">Logout</a>
    <!-- Footer -->
    <footer>
        <p>&copy; 2023 E-Learning Platform. All rights reserved.</p>
    </footer>

    <!-- JavaScript files -->
    <script src="script.js"></script>

</body>
</html>
