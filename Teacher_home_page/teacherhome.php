<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include '../Navber/teachnav.php'; ?>

    <div class="headers">
        <h1>Welcome, Teacher</h1>
        <br>
        <p>Manage quizzes, monitor student progress, and create new learning opportunities.</p>
    </div>

    <div class="container">
        <!-- Manage Students Card -->
        <!-- <div class="action-card">
            <img src="https://icon-library.com/images/manage-icon/manage-icon-12.jpg" alt="Manage Students">
            <h3>Manage Students</h3>
            <p>View and manage student profiles and performance in each course.</p>
            <form action="../Teacher_Allpage/questionformat.php" method="get">
                <button class="btn" type="submit">Open</button>
            </form>
        </div> -->

        <!-- Create Quiz Card -->
        <div class="action-card">
            <img src="https://icon-library.com/images/create-icon/create-icon-9.jpg" alt="Create Quiz">
            <h3>Create Quiz</h3>
            <p>Build new quizzes with customizable questions for your students.</p>
            <form action="path_to_create_quiz_page.php" method="get">
                <button class="btn" type="submit">Open</button>
            </form>
        </div>

        <!-- View Results Card -->
        <div class="action-card">
            <img src="https://icon-library.com/images/results-icon/results-icon-7.jpg" alt="View Results">
            <h3>View Results</h3>
            <p>Analyze quiz results and track student progress across subjects.</p>
            <form action="path_to_view_results_page.php" method="get">
                <button class="btn" type="submit">Open</button>
            </form>
        </div>
    </div>
</body>

</html>