<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="../calculator/style.css"> -->
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <p class="quiz">Quiz Sphere</p>
        </div>
        <nav class="nav">
            <a href="../Student_home_page/studenthome.php">Home</a>
            <a href="../Student_Allpage/takequiz.php">Take Quiz</a>
            <a href="../">Result</a>
            <!-- <a href="../Student_Allpage/questionformat.php">Provide Test</a> -->
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
                    <!-- <li><a href="javascript:void(0);" onclick="openCalculator()" id="openBtn">Calculator</a>
                        </li> -->
                    <li><a href="../about_us/about.php">About Us</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <script>
        function togglePopup() {
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }
    </script>

</body>

</html>