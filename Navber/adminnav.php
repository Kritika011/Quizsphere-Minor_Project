<?php
session_start();
require '../config.php';

// Check if user data is available in the session
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect to login page or show an error if not logged in
    header("Location: ../Home_page/index.php");
    exit();
}

// Retrieve session variables
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Query to get name from user table and profile_image from admindetails table
$query = $conn->prepare("SELECT u.name, a.profile_image FROM admins u 
                        JOIN admindetails a ON u.id = a.user_id
                        WHERE u.id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    // Fetch user and admin details
    $user = $result->fetch_assoc();
    $name = $user['name'];
    $profile_image = $user['profile_image'];
} else {
    // Handle case where user details are not found (optional)
    $name = "Admin Name"; // Default name
    $profile_image = "image/icon.jpg"; // Default image
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <p class="quiz">Quiz Sphere</p>
        </div>
        <nav class="nav">
            <a href="../admin_home_page/adminhome.php">Home</a>
            <a href="../Admin_Allpages/subjectaddition.php">Subject_addtion</a>
            <a href="../Admin_Allpages/questionformat.php">Provide Test</a>
            <a href="../Admin_Allpages/takequiz.php">Contributions</a>
            <a href="../Admin_Allpages/studentlist.php">User_list</a>
            <a href="../Admin_Allpages/subjectlist.php">subject_list</a>
        </nav>
        <div class="profile">
            <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Profile Icon" class="profile-icon"
                onclick="togglePopup()">
            <div id="popup" class="popup">
                <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Profile Picture" class="profile-image">
                <h3 class="names"><?php echo htmlspecialchars($name); ?></h3>
                <ul>
                    <li><a href="#">Account Setting</a></li>
                    <li><a href="../contact_us/contactadmin.php">Contact Us</a></li>
                    <li><a href="../about_us/aboutadmin.php">About Us</a></li>
                    <li><a href="../Navber/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <footer></footer>
    <script>
        function togglePopup() {
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }
    </script>
</body>

</html>