<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questioninput.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <?php
    include '../Navber/nav.php';
    ?>

    <div id="section2">
        <h2>Enter Here</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label class="label1">Enter Your 1 Question</label>
            <input class="input" type="text"><br>
            <div class="choose">
                <label class="label2">Answer</label>
                <input class="input2" type="text">
                <br><br>
                <label class="label2">Option 2</label><br>
                <input class="input2" type="text"><br>
            </div>

            <div class="choose">

                <label class="label2">Option 3</label><br>
                <input class="input2" type="text">

                <label class="label2">Option 4</label><br>
                <input class="input2" type="text"><br>
            </div>

            <label class="label1">Enter Your 2 Question</label>
            <input class="input" type="text"><br>
            <div class="choose">
                <label class="label2">Answer</label><br>
                <input class="input2" type="text">
                <br><br>
                <label class="label2">Option 2</label><br>
                <input class="input2" type="text"><br>
            </div>

            <div class="choose">

                <label class="label2">Option 3</label><br>
                <input class="input2" type="text">

                <label class="label2">Option 4</label><br>
                <input class="input2" type="text"><br>
            </div>

            <input class="btn" type="submit" name="submit" value="Submit">







        </form>


    </div>

    </div>
</body>

</html>