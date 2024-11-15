<?php
// You can add any PHP logic here if needed, such as user authentication or dynamic content
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Floating Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="logo">Your Website</a>
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
                <!-- Open Calculator Button -->
                <button onclick="openCalculator()" id="openBtn" class="nav-btn">Open Calculator</button>
            </div>
        </div>
    </nav>

    <div id="calculator" class="calculator">
        <div class="headers">
            <span class="titles">Advanced Calculator</span>
            <button onclick="closeCalculator()">X</button>
        </div>
        <input class="inputes" type="text" id="display" disabled>
        <div class="buttons">
            <button class="buttones" onclick="appendToDisplay('1')">1</button>
            <button class="buttones" onclick="appendToDisplay('2')">2</button>
            <button class="buttones" onclick="appendToDisplay('3')">3</button>
            <button class="buttones" onclick="appendToDisplay('+')">+</button>
            <button class="buttones" onclick="appendToDisplay('4')">4</button>
            <button class="buttones" onclick="appendToDisplay('5')">5</button>
            <button class="buttones" onclick="appendToDisplay('6')">6</button>
            <button class="buttones" onclick="appendToDisplay('-')">-</button>
            <button class="buttones" onclick="appendToDisplay('7')">7</button>
            <button class="buttones" onclick="appendToDisplay('8')">8</button>
            <button class="buttones" onclick="appendToDisplay('9')">9</button>
            <button class="buttones" onclick="appendToDisplay('')"></button>
            <button class="buttones" onclick="appendToDisplay('0')">0</button>
            <button class="buttones" onclick="appendToDisplay('.')">.</button>
            <button class="buttones" onclick="calculate()">=</button>
            <button class="buttones" onclick="appendToDisplay('/')">/</button>
            <button class="buttones" onclick="clearDisplay()">C</button>
            <button class="buttones" onclick="calculateSquareRoot()">√</button>
            <button class="buttones" onclick="appendToDisplay('')">^</button>
            <button class="buttones" onclick="calculateSin()">sin</button>
            <button class="buttones" onclick="calculateCos()">cos</button>
            <button class="buttones" onclick="calculateTan()">tan</button>
            <button class="buttones" onclick="calculateLog()">log</button>
            <button class="buttones" onclick="calculateExp()">exp</button>
        </div>
    </div>
    <!-- <button onclick="openCalculator()" id="openBtn">Open Calculator</button> -->

    <script src="script.js"></script>
</body>

</html>