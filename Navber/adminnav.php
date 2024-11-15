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
    <style>
        .dropdown {
            /* float: left; */
            overflow: hidden;
        }

        .dropdown .dropbtn {
            /* font-size: 16px; */
            border: none;
            outline: none;
            color: white;
            /* padding: 14px 16px; */
            /* background-color: inherit; */
            /* font-family: inherit; */
            margin: 0;
        }

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            /* background-color: red; */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            /* z-index: 1; */
        }

        .dropdown-content a {
            float: none;
            color: black;
            /* padding: 12px 16px; */
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
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
            <a href="../Admin_Allpages/adminhome.php">Home</a>
            <a href="../Admin_Allpages/subjectaddition.php">Subject_addtion</a>
            <a href="../Admin_Allpages/questionformat.php">Provide Test</a>
            <a href="#">Contributions</a>
            <!-- <div class="dropdown">
                <button class="dropbtn">
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div> -->
            <a href="../Admin_Allpages/studentlist.php">User_list</a>
            <a href="../Admin_Allpages/subjectlist.php">subject_list</a>
            <!-- <a href="https://chatgpt.com/">ChatBot</a> -->
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
                    <li><a href="#">Logout</a></li>
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