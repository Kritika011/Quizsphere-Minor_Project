<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Home_page/index.php"); // Redirect to login page if not logged in
    exit;
}

include '../config.php'; // Include the database connection

// Fetch result details
$student_id = $_SESSION['user_id']; // Get the logged-in student ID
$paper_id = isset($_GET['paper_id']) ? intval($_GET['paper_id']) : 0; // Get the paper_id from the URL
$score = isset($_GET['score']) ? intval($_GET['score']) : 0; // Get the score from the URL
$total_questions = isset($_GET['total_questions']) ? intval($_GET['total_questions']) : 0; // Get total questions from the URL
$correct_answers = isset($_GET['correct_answers']) ? intval($_GET['correct_answers']) : 0; // Get correct answers from the URL
$total_attended = isset($_GET['total_attended']) ? intval($_GET['total_attended']) : 0; // Get total attended questions

// Fetch paper details to display subject and time limit
$paper_query = "SELECT * FROM paperdetails WHERE paper_id = ?";
$stmt = mysqli_prepare($conn, $paper_query);
mysqli_stmt_bind_param($stmt, 'i', $paper_id);
mysqli_stmt_execute($stmt);
$paper_result = mysqli_stmt_get_result($stmt);
$paper_details = mysqli_fetch_assoc($paper_result);

// Get subject name (optional if you have a subjects table)
$subject_id = $paper_details['subject_id'];
$subject_query = "SELECT subject_name FROM subjects WHERE subject_id = ?";
$stmt = mysqli_prepare($conn, $subject_query);
mysqli_stmt_bind_param($stmt, 'i', $subject_id);
mysqli_stmt_execute($stmt);
$subject_result = mysqli_stmt_get_result($stmt);
$subject_name = mysqli_fetch_assoc($subject_result)['subject_name'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #333;
            color: white;
        }

        .result-box {
            border: 2px solid black;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            margin: 0px 20%;
        }

        h2 {
            text-align: center;
            color: white;
        }

        .details {
            font-size: 1.3rem;
            margin-bottom: 10px;
            margin-left: 30px;
        }

        .score {
            font-size: 1.5rem;
            color: green;
            font-weight: bold;
            margin-left: 30px;
        }

        .incorrect {
            font-size: 18px;
            color: red;
        }

        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: green;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <h2>Exam Results</h2>

    <div class="result-box">
        <p class="details">Subject: <?php echo $subject_name; ?></p>
        <!-- <p class="details">Paper ID: 
            <?php echo $paper_id; ?>
    </p> -->
        <p class="details">Time Limit: <?php echo $paper_details['time_limit']; ?> minutes</p>
        <p class="details">Total Questions: <?php echo $total_questions; ?></p>
        <p class="details">Questions Attended: <?php echo $total_attended; ?></p>
        <p class="details">Correct Answers: <?php echo $correct_answers; ?></p>

        <p class="score">Your Score: <?php echo $score; ?> / <?php echo $total_questions; ?></p>

        <?php if ($correct_answers < $total_questions): ?>
            <p class="incorrect">You have some incorrect answers. Please review them.</p>
        <?php endif; ?>

        <a href="../Student_home_page/studenthome.php" class="button">Go to Home</a>
    </div>

</body>

</html>