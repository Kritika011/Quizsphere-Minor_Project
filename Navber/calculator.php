<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop-up Calculator</title>
    <style>
        body {
            background-color: black;
            color: white;
        }

        .calculator {
            width: 300px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            position: absolute;
            top: 50px;
            left: 50px;
            z-index: 1000;
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .header .close-btn {
            cursor: pointer;
        }

        .calculator input,
        .calculator button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }

        .advanced-options {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="calculator" id="calc">
        <div class="header">
            <h3>Calculator</h3>
            <span class="close-btn" onclick="closeCalc()">X</span>
        </div>
        <input type="text" id="display" disabled>

        <!-- Buttons for basic operations -->
        <button onclick="addNumber('1')">1</button>
        <button onclick="addNumber('2')">2</button>
        <!-- Add more buttons as needed for operations -->

        <!-- Advanced options -->
        <div class="advanced-options">
            <button onclick="percentageToValue()">Percentage to Value</button>
            <button onclick="valueToPercentage()">Value to Percentage</button>
            <!-- Other advanced options -->
        </div>
    </div>

    <script>
        // Basic calculator logic
        function addNumber(num) {
            document.getElementById("display").value += num;
        }

        function percentageToValue() {
            // Conversion logic
            let percentage = parseFloat(prompt("Enter percentage:"));
            let total = parseFloat(prompt("Enter total value:"));
            alert(Value is ${ percentage / 100 * total});
    }

        // Close calculator function
        function closeCalc() {
            document.getElementById('calc').style.display = 'none';
        }
    </script>

</body>

</html>