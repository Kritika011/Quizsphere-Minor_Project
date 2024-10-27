<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questionformat.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <?php
    include '../Navber/nav.php';
    ?>

    <div id="form-making">
        <form>
            <label for="subjects">Subject Name</label>
            <select id="subjects" name="subjects">
                <option hidden>Select Subject Name</option>
                <option value="Java">Java</option>
                <option value="Operating System">Operating System</option>
                <option value="Python">Python</option>
                <option value="Database Management System">Database Management System</option>
            </select>
            <br><br>

            <label for="subject-code"> Subject Code </label>
            <select id="subject-code" name="subject-code">
                <option hidden>Select Subject Code</option>
                <option value="B">BCAC301</option>
                <option value="">BCAC302</option>
                <option value="">BCAC403</option>
                <option value="">BCAC401</option>
            </select>
            <br><br>
            <label>No of Question</label>

            <input class="input" type="text" placeholder="No of Questions">
            <br><br>

            <label class="marks">Marks per Question</label>

            <input class="input" type="text" placeholder="Marks per Question">
            <br><br>

            <label>Total Time</label>

            <input class="input" type="text" placeholder="Time Limit">
            <br><br>
            <button class="btn" type="submit">Submit</button>



        </form>
    </div>


</body>

</html>