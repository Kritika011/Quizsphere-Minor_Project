<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Home_page/index.php"); // Redirect to login page if not logged in
    exit;
}
// echo "Logged-in user ID: " . $_SESSION['user_id'];
// echo "User role: " . $_SESSION['role'];
// echo "Paper ID: " . $paper_id;



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
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #333;
            /* color: white; */
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 5px;
        }

        .timer {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff4747;
            text-align: right;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin: 10px 0;

        }

        .numse {
            font-size: 1.4rem;
            margin: 10px 0;
            color: white
        }

        #questions-container {
            margin: auto;
            align-items: center;
            /* text-align: center; */
            justify-content: center;
            background-color: #222;
            color: while;
            margin: 0px 20%;
        }

        /* Question container */
        .question {
            margin-bottom: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .question p {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .question-options label {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding: 8px;
            border-radius: 4px;
        }

        .question-options input[type="radio"] {
            margin-right: 10px;
        }

        .question-options input[type="radio"]:hover {
            background-color: black;
        }

        /* Button styles */
        .butts {
            margin: auto;
            text-align: center;
            align-items: center;
        }

        button {

            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        #prev {
            background-color: #f44336;
        }

        #prev:hover {
            background-color: #d32f2f;
        }

        /* Form control */
        #examForm {
            margin-top: 30px;
        }

        /* Navigation Buttons Container */
        .nav-buttons {
            text-align: center;
            margin-top: 20px;
        }

        /* Adjustments for mobile devices */
        /* @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            h1 {
                font-size: 2rem;
            }

            .timer {
                font-size: 1.2rem;
            }

            .question p {
                font-size: 1.2rem;
            }

            .question-options label {
                font-size: 1rem;
            }

            button {
                padding: 8px 16px;
                font-size: 1rem;
            }
        } */
    </style>
</head>

<body>

    <h1>Exam</h1>
    <p class="timer">Time Left: <span id="timer"></span></p>
    <p class="numse">Question <span id="current_question_num">1</span> of <span
            id="total_questions"><?php echo $total_questions; ?></span></p>


    <form action="submit_exam.php?paper_id=<?php echo $paper_id; ?>" method="POST" id="examForm">


        <input type="hidden" name="current_question_index" id="current_question_index" value="0">
        <input type="hidden" name="selected_answer" id="selected_answer" value="">

        <!-- Display the questions dynamically here -->
        <div id="questions-container">


            <?php foreach ($questions as $index => $question): ?>
                <div class="question" id="question-<?php echo $index; ?>" style="display: none;">
                    <p><?php echo $question['question']; ?></p>

                    <div class="question-options">
                        <label><input type="radio" name="answer<?php echo $question['question_id']; ?>" value="option1">
                            <?php echo $question['option1']; ?></label><br>
                        <label><input type="radio" name="answer<?php echo $question['question_id']; ?>" value="option2">
                            <?php echo $question['option2']; ?></label><br>
                        <label><input type="radio" name="answer<?php echo $question['question_id']; ?>" value="option3">
                            <?php echo $question['option3']; ?></label><br>
                        <label><input type="radio" name="answer<?php echo $question['question_id']; ?>" value="option4">
                            <?php echo $question['option4']; ?></label>
                    </div>
                </div>
            <?php endforeach; ?>







        </div>


        <div class="butts">
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
        if (timer === 0) {
            alert("Time's up! Submitting the exam.");
            document.getElementById('examForm').submit();  // This triggers the form submission.
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
        const options = document.querySelectorAll("input[type='radio']");
        options.forEach((option) => {
            option.addEventListener("change", function () {
                const questionIndex = this.name.replace("answer", "");
                document.getElementById('selected_answer').value = this.value;  // Store selected answer
            });
        });
    </script>
    <?php
    // echo "Paper ID: " . $paper_id;
    
    ?>
</body>

</html>