<?php
include '../config.php'; // Database connection

// Get the paper_id from the URL
$paper_id = isset($_GET['paper_id']) ? intval($_GET['paper_id']) : 0;

// Fetch paper details
$paper_query = "SELECT * FROM paperdetails WHERE paper_id = $paper_id";
$paper_result = mysqli_query($conn, $paper_query);
$paper = mysqli_fetch_assoc($paper_result);

// Fetch all questions for the paper
$questions_query = "SELECT * FROM exam_questions WHERE paper_id = $paper_id";
$questions_result = mysqli_query($conn, $questions_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/questiondetails.css"> -->
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <?php session_start();
    include '../config.php';  // Include your database connection file
    include '../Navber/nav.php'; ?>

    <h3><?php echo $paper['subject_id'] . " - Question Paper Set " . $paper_id; ?></h3>
    <p><b>Number of Questions:</b> <?php echo $paper['num_of_questions']; ?></p>
    <p><b>Marks per Question:</b> <?php echo $paper['marks_per_question']; ?></p>
    <p><b>Time Limit:</b> <?php echo $paper['time_limit']; ?> minutes</p>
    <br>

    <div class="content">
        <form method="post" action="submit_answers.php">
            <?php if (mysqli_num_rows($questions_result) > 0): ?>
                <?php while ($question = mysqli_fetch_assoc($questions_result)): ?>
                    <div class="question">
                        <p><b>Q<?php echo $question['question_id']; ?>:</b> <?php echo $question['question']; ?></p>
                        <div class="options">
                            <label>
                                <input type="radio" name="answer_<?php echo $question['question_id']; ?>" value="1">
                                <?php echo $question['option1']; ?>
                            </label>
                            <label>
                                <input type="radio" name="answer_<?php echo $question['question_id']; ?>" value="2">
                                <?php echo $question['option2']; ?>
                            </label>
                            <label>
                                <input type="radio" name="answer_<?php echo $question['question_id']; ?>" value="3">
                                <?php echo $question['option3']; ?>
                            </label>
                            <label>
                                <input type="radio" name="answer_<?php echo $question['question_id']; ?>" value="4">
                                <?php echo $question['option4']; ?>
                            </label>
                        </div>
                    </div>
                    <hr>
                <?php endwhile; ?>
                <button type="submit" class="btn">Submit Answers</button>
            <?php else: ?>
                <p>No questions available for this paper.</p>
            <?php endif; ?>
        </form>
    </div>

</body>

</html>