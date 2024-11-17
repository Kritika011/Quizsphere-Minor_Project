<?php
session_start();
require '../config.php';

// Signup handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = htmlspecialchars($_POST['role']);

    if ($role === 'admin') {
        // Store admin in a separate table
        $query = $conn->prepare("INSERT INTO admins (name, email, password, verified) VALUES (?, ?, ?, 0)");
        $query->bind_param("sss", $name, $email, $password);
    } else {
        // Store students and teachers in the 'users' table
        $query = $conn->prepare("INSERT INTO user (name, email, password, role) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssss", $name, $email, $password, $role);
    }

    if ($query->execute()) {
        $_SESSION['message'] = "Signup successful. Please log in.";
    } else {
        $_SESSION['error'] = "Signup failed. Please try again.";
    }
}


// Login handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $role = htmlspecialchars($_POST['role']); // Role selected during login

    if ($role === 'admin') {
        // Admin login with additional check for verified status
        $query = $conn->prepare("SELECT * FROM admins WHERE email = ? AND role = ?");
        $query->bind_param("ss", $email, $role);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $role;

                if ($user['verified'] == 0) {
                    $_SESSION['unverified_admin'] = true; // Set session for unverified admins
                    header("Location: ../Home_page/index.php");
                    exit;
                } else {
                    // If verified admin, redirect to the admin home page
                    header("Location: ../admin_home_page/adminhome.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid password.";
            }
        } else {
            $_SESSION['error'] = "No admin account found with this email.";
        }
    } else {
        // Teacher/Student login: Check in 'user' table
        $query = $conn->prepare("SELECT * FROM user WHERE email = ? AND role = ?");
        $query->bind_param("ss", $email, $role);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $role;

                if ($role === 'student') {
                    header("Location: ../Student_home_page/studenthome.php");
                    exit;
                } elseif ($role === 'teacher') {
                    header("Location: ../Teacher_home_page/teacherhome.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid password.";
            }
        } else {
            $_SESSION['error'] = "No account found with this email.";
        }
    }
}
?>

<?php
// Check for unverified admin message
if (isset($_SESSION['unverified_admin']) && $_SESSION['unverified_admin']) {
    $unverifiedMessage = "Your admin account is not verified yet. Please wait for confirmation.";
    unset($_SESSION['unverified_admin']); // Clear the session variable
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quiz Website</title>
</head>

<body>


    <header class="header">
        <div class="logo">
            <p class="quiz">Quiz Sphere</p>
        </div>
        <nav class="nav">
            <a href="../Home_page/index.php">Home</a>
            <a href="../contact_us/contact.php">Contact Us</a>
            <a href="../about_us/about.php">About Us</a>
        </nav>
    </header>
    <?php if (isset($unverifiedMessage)): ?>
        <div class="unverified-banner">
            <?php echo $unverifiedMessage; ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="left-container">
            <div class="typewriter-container">
                <div class="typewriter-text">Welcome <span> to the Quiz Website</span></div>
            </div>
            <p>Join us today and test your knowledge across various subjects!</p>
            <div class="signup-buttons">
                <button onclick="showPopup('student')"> Sign in</button>
                <button onclick="showPopup('Teacher')"> Sign up</button>
            </div>
        </div>
        <div class="right-container">
            <div class="slider" style="max-width: 680px;">
                <img class="mySlides" src="image/0_DI4ointlcukqBf0s.jpg" style="width:100%">
                <img class="mySlides" src="image/istockphoto-1146488500-612x612.jpg" style="width:100%">
            </div>
        </div>
        <div id="popupOverlay" class="popup-overlay" onclick="hidePopup()"></div>
        <div id="popupBox" class="popup-box">
            <span class="close-btn" onclick="hidePopup()">&times;</span>
            <div class="form-toggle">
                <button id="signinBtn" onclick="showSignIn()">Sign in</button>
                <button id="signupBtn" onclick="showSignUp()">Sign up</button>
            </div>
            <div class="form-container">
                <!-- Sign In Form -->
                <form id="signinForm" class="form-content left" method="POST">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <select name="role" id="role" class="role" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>

                    <button type="submit" name="signin">Sign In</button>
                    <p>Don't have an account? <a href="#" onclick="showSignUp()">Sign up</a></p>
                </form>
                <!-- Sign Up Form -->
                <form id="signupForm" class="form-content right" method="POST">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <select name="role" id="role" class="role" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>

                    <button type="submit" name="signup">Sign Up</button>
                    <p>Already have an account? <a href="#" onclick="showSignIn()">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>


    <script src="scripts.js"></script>


</body>

</html>