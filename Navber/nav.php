<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../calculator/style.css">
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
            <a href="../Student_home_page/studenthome.php">Home</a>
            <a href="../Student_Allpage/takequiz.php">Take Quiz</a>
            <a href="../">Result</a>
            <a href="../Student_Allpage/questionformat.php">Provide Test</a>
            <a href="https://chatgpt.com/">ChatBot</a>
        </nav>
        <div class="profile">
            <img src="image/icon.jpg" alt="Profile Icon" class="profile-icon" onclick="togglePopup()">
            <div id="popup" class="popup">
                <img src="image/icon.jpg" alt="Profile Picture" class="profile-image">
                <h3 class="names">John Doe</h3>
                <ul>
                    <li><a href="#">Account Setting</a></li>
                    <li><a href="../Contact_us/contact.php">Contact Us</a></li>
                    <li><a href="#" onclick="openCalculator()" id="openBtn">Open Calculator</a></li>
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
    <div id="calculator" class="calculator">
        <div class="header">
            <span class="title">Advanced Calculator</span>
            <button onclick="closeCalculator()">X</button>
        </div>
        <input type="text" id="display" disabled>
        <div class="buttons">
            <button onclick="appendToDisplay('1')">1</button>
            <button onclick="appendToDisplay('2')">2</button>
            <button onclick="appendToDisplay('3')">3</button>
            <button onclick="appendToDisplay('+')">+</button>
            <button onclick="appendToDisplay('4')">4</button>
            <button onclick="appendToDisplay('5')">5</button>
            <button onclick="appendToDisplay('6')">6</button>
            <button onclick="appendToDisplay('-')">-</button>
            <button onclick="appendToDisplay('7')">7</button>
            <button onclick="appendToDisplay('8')">8</button>
            <button onclick="appendToDisplay('9')">9</button>
            <button onclick="appendToDisplay('')"></button>
            <button onclick="appendToDisplay('0')">0</button>
            <button onclick="appendToDisplay('.')">.</button>
            <button onclick="calculate()">=</button>
            <button onclick="appendToDisplay('/')">/</button>
            <button onclick="clearDisplay()">C</button>
            <button onclick="calculateSquareRoot()">√</button>
            <button onclick="appendToDisplay('')">^</button>
            <button onclick="calculateSin()">sin</button>
            <button onclick="calculateCos()">cos</button>
            <button onclick="calculateTan()">tan</button>
            <button onclick="calculateLog()">log</button>
            <button onclick="calculateExp()">exp</button>
        </div>
    </div>
    <button onclick="openCalculator()" id="openBtn">Open Calculator</button>
    <script src="../calculator/script.js"></script>
</body>

</html>