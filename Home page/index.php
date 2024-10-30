<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Quiz Website</title>
</head>

<body>
    <!--          HEADER        -->
    <header class="header">
        <div class="logo">
            <p class="quiz">Quiz Sphere</p>
        </div>
        <nav class="nav">
            <a href="">Admin</a>
            <a href="#">ChatBot</a>
            <a href="../Contact_us/contact.php">Contact Us</a>
            <a href="../about_us/about.php">About Us</a>

        </nav>
        <!-- <div class="profile">
            <img src="image/icon.jpg" alt="Profile Icon" class="profile-icon" onclick="togglePopup()">
            <div id="popup" class="popup">
                <img src="icon.jpg" alt="Profile Picture" class="profile-image">
                <h3 class="names">John Doe</h3>
                <ul>
                    <li><a href="#">Account Setting</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div> -->
    </header>
    <!-- BODY DIVIDED IN TWO CONTAINER-->

    <div class="container">
        <div class="left-container">
            <div class="typewriter-container">
                <div class="typewriter-text">Welcome <span> to the Quiz Website</span></div>
            </div>

            <p>Join us today and test your knowledge across various subjects!</p>
            <div class="signup-buttons">
                <!-- Buttons to trigger the popup -->
                <button onclick="showPopup('student')"> Student</button>
                <button onclick="showPopup('teacher')"> Teacher</button>
            </div>
        </div>

        <div class="right-container">
            <div class="slider" style="max-width: 680px;">
                <img class="mySlides" src="image/0_DI4ointlcukqBf0s.jpg" style="width:100%">
                <img class="mySlides" src="image/istockphoto-1146488500-612x612.jpg" style="width:100%">
                <img class="mySlides" src="image/960x0.webp" style="width:100%">
                <img class="mySlides" src="image/istockphoto-1177213691-612x612.jpg" style="width:100%">
                <img class="mySlides" src="image/istockphoto-1356323195-612x612.jpg" style="width:100%">
                <img class="mySlides" src="image/istockphoto-1502704339-612x612.webp">
            </div>
        </div>

        <!--             POPUP SIGNUP/SIGNIN PAGE          -->

        <!-- Popup Overlay -->
        <div id="popupOverlay" class="popup-overlay" onclick="hidePopup()"></div>

        <!-- Popup Box -->
        <div id="popupBox" class="popup-box">

            <!-- Close Button -->
            <span class="close-btn" onclick="hidePopup()">&times;</span>

            <!-- Toggle Buttons -->
            <div class="form-toggle">
                <button id="signinBtn" onclick="showSignIn()">Sign in</button>
                <button id="signupBtn" onclick="showSignUp()">Sign up</button>
            </div>

            <!-- Forms Container -->
            <div class="form-container">

                <!-- Sign In Form -->

                <div id="signinForm" class="form-content left">
                    <!-- <h2>Sign In</h2> -->
                    <input type="text" placeholder="Email/Phone number">
                    <input type="password" placeholder="Password">
                    <a href="#" style="float: right; margin: 5px 0;">Forgot Password?</a>
                    <button>Sign In</button>
                    <p>Don't have an account? <a href="#" onclick="showSignUp()">Sign up</a></p>
                </div>

                <!-- Sign Up Form -->

                <div id="signupForm" class="form-content right">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <input type="tel" placeholder="Phone number">
                    <input type="password" placeholder="Password">
                    <button>Sign Up</button>
                    <p>Already have an account? <a href="#" onclick="showSignIn()">Sign in</a></p>
                </div>
            </div>
        </div>

        <script src="scripts.js"></script>
</body>

</html>