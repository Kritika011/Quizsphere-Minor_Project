<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Floating Calculator</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .calculator {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: black;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .calculator input,
        .calculator button {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .calculator button {
            background-color: #444;
            color: white;
            cursor: pointer;
        }

        .calculator button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <div class="calculator" id="calculator">
        <input type="text" id="expression" placeholder="Enter expression" />
        <button onclick="calculate()">Calculate</button>
        <div id="result"></div>
    </div>

    <script>
        // Function to move the calculator around
        const calculator = document.getElementById('calculator');
        let isDragging = false;

        calculator.addEventListener('mousedown', (e) => {
            isDragging = true;
            const offsetX = e.clientX - calculator.getBoundingClientRect().left;
            const offsetY = e.clientY - calculator.getBoundingClientRect().top;

            const moveCalculator = (e) => {
                if (isDragging) {
                    calculator.style.left = e.pageX - offsetX + 'px';
                    calculator.style.top = e.pageY - offsetY + 'px';
                }
            };

            document.addEventListener('mousemove', moveCalculator);

            document.addEventListener('mouseup', () => {
                isDragging = false;
                document.removeEventListener('mousemove', moveCalculator);
            }, { once: true });
        });

        function calculate() {
            const expression = document.getElementById('expression').value;
            fetch('calculate.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'expression=' + encodeURIComponent(expression)
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('result').innerText = data;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

</body>

</html>