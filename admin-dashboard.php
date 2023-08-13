<?php
session_start(); // Start session

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html"); // Redirect to admin login page if not logged in
    exit();
}

// // Logout logic
// if (isset($_GET['logout'])) {
//     session_destroy(); // Destroy the session
//     header("Location: admin-login.php"); // Redirect to admin login page after logout
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <li><a href="admin-login.html">Admin Login</a></li>
                <li><a href="#">Admin Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <h1>Welcome to the Admin Dashboard, <?php echo $_SESSION['admin_username']; ?>!</h1>
    <!-- Your admin dashboard content here -->
    

    <!-- Main Content -->
    <main>
        <!-- Admin Dashboard Section -->
        <section class="admin-dashboard">
            <h2>Admin Dashboard</h2>
            <div class="manage-courses">
                <h3>Manage Courses</h3>
                <ul>
                    <li>Course 1 <br><button>Edit</button> <button>Delete</button></li><br>
                    <li>Course 2 <br><button>Edit</button> <button>Delete</button></li>
                    <!-- Add more courses -->
                </ul>
                <br>
                <button>Add New Course</button>
            </div>
            <br>
            <div class="manage-users">
                <h3>Manage Users</h3>
                <ul>
                    <li>User 1 <br><button>Edit</button> <button>Delete</button></li><br>
                    <li>User 2 <br><button>Edit</button> <button>Delete</button></li>
                    <!-- Add more users -->
                </ul>
            </div>
        </section>
    </main>

    <a href="admin-logout.php">Logout</a>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 E-Learning Platform. All rights reserved.</p>
    </footer>

    <!-- JavaScript files -->
    <script src="script.js"></script>
</body>
</html>
