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
            <!-- <img src="icon.jpg" alt="Logo" width="40"> -->
            <p class="quiz">Quiz Sphere</p>
            <!-- Or use text for the website name -->
            <!-- <h1>QuizWhiz</h1> -->
        </div>
        <nav class="nav">
            <a href="../Teacher_home_page/teacherhome.html">Home</a>
            <a href="../Teacher_Allpage/questionformat.php">Provide Test</a>
            <a href="../Teacher_Allpage/submitbytech.php">Contributions</a>
            <a href="../Teacher_Allpage/studentattention.php">Result</a>
            <a href="../main.php">ChatBot</a>
        </nav>
        <div class="profile">
            <img src="image/icon.jpg" alt="Profile Icon" class="profile-icon" onclick="togglePopup()">
            <div id="popup" class="popup">
                <img src="image/icon.jpg" alt="Profile Picture" class="profile-image">
                <h3 class="names">John Doe</h3>
                <ul>
                    <li><a href="#">Account Setting</a></li>
                    <li><a href="../Contact_us/contact.php">Contact Us</a></li>
                    <li><a href="../about_us/about.php">About Us</a></li>
                    <li><a href="../Navber/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <footer>

    </footer>
    <script>
        function togglePopup() {
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }
    </script>
</body>

</html>