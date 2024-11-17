<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Home_page/index.php"); // Redirect to login page if not logged in
    exit;
}
echo "Paper ID: " . $paper_id;

echo "Logged-in user ID: " . $_SESSION['user_id'];
echo "User role: " . $_SESSION['role'];

include '../config.php'; // Include the database connection

$student_id = $_SESSION['user_id']; // Get the logged-in student ID
$paper_id = isset($_GET['paper_id']) ? intval($_GET['paper_id']) : 0;

// Fetch time limit for paper
$time_limit_query = "SELECT time_limit FROM paperdetails WHERE paper_id = '$paper_id'";
$time_limit_result = mysqli_query($conn, $time_limit_query);
$paper_result = mysqli_fetch_assoc($time_limit_result);
$time_limit = $paper_result['time_limit']; // Get the time limit in minutes

// Fetch exam questions and options from the exam_questions table
$questions_query = "SELECT * FROM exam_questions WHERE paper_id = '$paper_id'";
$questions_result = mysqli_query($conn, $questions_query);

// Initialize question data
$questions = [];
while ($row = mysqli_fetch_assoc($questions_result)) {
    $questions[] = $row;
}
$total_questions = count($questions);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <style>
        /* Basic CSS for exam layout */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .question {
            margin-bottom: 20px;
        }

        .timer {
            font-size: 20px;
            font-weight: bold;
            color: red;
        }

        .question-options {
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            margin: 5px;
        }
    </style>
</head>

<body>

    <h1>Exam</h1>
    <p class="timer">Time Left: <span id="timer"></span></p>
    <p>Question <span id="current_question_num">1</span> of <span
            id="total_questions"><?php echo $total_questions; ?></span></p>


    <form action="submit_exam.php?paper_id=<?php echo $paper_id; ?>" method="POST">

        <input type="hidden" name="current_question_index" id="current_question_index" value="0">
        <input type="hidden" name="selected_answer" id="selected_answer" value="">

        <!-- Display the questions dynamically here -->
        <div id="questions-container">
            <?php foreach ($questions as $index => $question): ?>
                <div class="question" id="question-<?php echo $index; ?>" style="display: none;">
                    <p><?php echo $question['question']; ?></p>

                    <div class="question-options">
                        <label><input type="radio" name="answer<?php echo $index; ?>"
                                value="<?php echo $question['option1']; ?>">
                            <?php echo $question['option1']; ?></label><br>

                        <label><input type="radio" name="answer<?php echo $index; ?>"
                                value="<?php echo $question['option2']; ?>">
                            <?php echo $question['option2']; ?></label><br>

                        <label><input type="radio" name="answer<?php echo $index; ?>"
                                value="<?php echo $question['option3']; ?>">
                            <?php echo $question['option3']; ?></label><br>

                        <label><input type="radio" name="answer<?php echo $index; ?>"
                                value="<?php echo $question['option4']; ?>">
                            <?php echo $question['option4']; ?></label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div>
            <button type="button" id="prev" onclick="navigate('prev')">Previous</button>
            <button type="button" id="next" onclick="navigate('next')">Next</button>
            <button type="submit" name="action" value="submit">Submit</button>
        </div>
    </form>

    <script>
        // Set timer value from PHP
        let timer = <?php echo $time_limit; ?> * 60; // Convert minutes to seconds
        setInterval(function () {
            if (timer > 0) {
                timer--;
                document.getElementById('timer').textContent = `${Math.floor(timer / 60)}:${timer % 60}`;
            } else {
                alert("Time's up! Submitting the exam.");
                document.getElementById('examForm').submit();
            }
        }, 1000);

        let currentQuestionIndex = 0;
        const totalQuestions = <?php echo $total_questions; ?>;

        // Display the current question and hide others
        function displayQuestion(index) {
            for (let i = 0; i < totalQuestions; i++) {
                const questionElement = document.getElementById('question-' + i);
                if (i === index) {
                    questionElement.style.display = 'block';
                } else {
                    questionElement.style.display = 'none';
                }
            }
            document.getElementById('current_question_num').textContent = index + 1;
        }

        function navigate(action) {
            if (action === 'next') {
                if (currentQuestionIndex < totalQuestions - 1) {
                    currentQuestionIndex++;
                    displayQuestion(currentQuestionIndex);
                }
            } else if (action === 'prev') {
                if (currentQuestionIndex > 0) {
                    currentQuestionIndex--;
                    displayQuestion(currentQuestionIndex);
                }
            }
        }

        // Initialize the first question
        displayQuestion(currentQuestionIndex);
    </script>
    <?php
    // echo "Paper ID: " . $paper_id;
    
    ?>
</body>

</html>