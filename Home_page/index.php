<?php
session_start();
require '../config.php';

// Signup handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Sanitize and validate input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
    $role = htmlspecialchars(trim($_POST['role']));

    // Optional: Validate inputs
    if (empty($name) || empty($email) || empty($_POST['password']) || empty($role)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../Home_page/index.php");
        exit();
    }

    try {
        if ($role === 'admin') {
            // Store admin in a separate table
            $query = $conn->prepare("INSERT INTO admins (name, email, password, verified) VALUES (?, ?, ?, 0)");
            if (!$query) {
                throw new Exception("Prepare statement failed: " . $conn->error);
            }
            $query->bind_param("sss", $name, $email, $password);
            $query->execute();
            $user_id = $conn->insert_id;

            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $name;

            $_SESSION['message'] = "Admin signup successful. Please wait for verification.";
            $redirect_page = "../Registration/adminregistration.php"; // Admin registration page
        } else {
            // Store students and teachers in the 'user' table
            $query = $conn->prepare("INSERT INTO user (name, email, password, role) VALUES (?, ?, ?, ?)");
            if (!$query) {
                throw new Exception("Prepare statement failed: " . $conn->error);
            }
            $query->bind_param("ssss", $name, $email, $password, $role);
            $query->execute();

            // Retrieve the inserted user ID
            $user_id = $conn->insert_id;

            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $name;

            // Determine the redirect page based on role
            if ($role === 'student') {
                $_SESSION['message'] = "Student signup successful. Please complete your registration.";
                $redirect_page = "../Registration/registration.php"; // Student registration page
            } elseif ($role === 'teacher') {
                $_SESSION['message'] = "Teacher signup successful. Please complete your registration.";
                $redirect_page = "../Registration/teachregister.php"; // Teacher registration page
            } else {
                // Handle unexpected roles
                $_SESSION['error'] = "Invalid role selected.";
                header("Location: ../Home_page/index.php");
                exit();
            }
        }

        // Redirect to the respective registration page
        header("Location: $redirect_page");
        exit(); // Ensure no further code is executed
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // Error code for duplicate entry
            $_SESSION['error'] = "Email ID already registered. Please enter a different Email ID.";
        } else {
            $_SESSION['error'] = "Signup failed: " . $e->getMessage();
        }
        header("Location: ../Home_page/index.php"); // Redirect to home page on error
        exit(); // Ensure no further code is executed
    }
}
?>


<?php

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
    <style>
        .message-box {
            position: fixed;
            /* bottom: 20px; */
            top: 0;
            left: 30%;
            margin: auto;
            align-items: center;
            text-align: center;
            justify-content: center;
            width: 470px;
            padding: 27px 20px;
            background-color: red;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
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
                <button onclick="showPopup('signin')">Sign In</button>
                <button onclick="showPopup('signup')">Sign Up</button>
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

    <?php if (isset($_SESSION['error'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const messageBox = document.createElement('div');
                messageBox.className = 'message-box';
                messageBox.innerText = "<?php echo $_SESSION['error']; ?>";

                document.body.appendChild(messageBox);

                setTimeout(() => {
                    messageBox.remove();
                }, 9000); // Auto-hide after 5 seconds
            });
        </script>
        <?php unset($_SESSION['error']); endif; ?>
    <script src="scripts.js"></script>

    <?php
    // if (isset($_SESSION['error'])) {
//     echo "Error: " . $_SESSION['error']; // For debugging
// }
    ?>
</body>

</html>