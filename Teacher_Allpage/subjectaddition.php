<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subjectaddition.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <?php
    include '../Navber/nav.php';
    ?>

    <div id="form-making">
        <form action="../Student_Allpage/questioninput.php" message="done">

            <input class="input" type="name" placeholder="Subject Name" required>
            <br><br>

            <!-- <label class="marks">Marks per Question</label> -->

            <input class="input" type="text" placeholder="Subject Code" required>
            <br><br>

            <!-- <label>Total Time</label> -->

            <input class="input" type="name" placeholder="Course" required>
            <br><br>
            <input class="input" type="name" placeholder="Semester" required>
            <br><br>
            <input class="input details" type="details" placeholder="Details" required>
            <br><br>
            <!-- <input class="input" type="image" placeholder="image"> -->
            <!-- <label for="id_card" class="input">Upload ID Card:</label> -->
            <input type="file" name="id_card" class="input image" accept="image/*" required>
            <br><br>
            <input class="btn" type="submit" name="submit" value="Submit">



        </form>
    </div>


</body>

</html>