<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Home_page/index.php"); // Redirect to login page if not logged in
    exit;
}

include '../config.php'; // Include the database connection

$student_id = $_SESSION['user_id']; // Get the logged-in student ID
$paper_id = isset($_GET['paper_id']) ? intval($_GET['paper_id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch all questions and correct answers for the given paper_id
    $questions_query = "SELECT question_id, correct_answer FROM exam_questions WHERE paper_id = '$paper_id'";
    $questions_result = mysqli_query($conn, $questions_query);

    $total_questions = mysqli_num_rows($questions_result);
    $correct_answers = 0;
    $total_attended = 0;

    while ($row = mysqli_fetch_assoc($questions_result)) {
        $question_id = $row['question_id'];
        $correct_answer = $row['correct_answer'];
        $student_answer = isset($_POST["answer$question_id"]) ? $_POST["answer$question_id"] : null;

        // Determine the correctness of the answer
        $is_correct = ($student_answer === $correct_answer) ? 1 : 0;
        if ($student_answer !== null) {
            $total_attended++;
        }
        if ($is_correct) {
            $correct_answers++;
        }

        // Insert or update the answer in the exam_answers table
        $status = ($student_answer !== null) ? 'attended' : 'unattended';
        $insert_answer_query = "INSERT INTO exam_answers (student_id, question_id, answer, status, is_correct)
                                VALUES ('$student_id', '$question_id', '$student_answer', '$status', '$is_correct')
                                ON DUPLICATE KEY UPDATE 
                                answer = '$student_answer', 
                                status = '$status', 
                                is_correct = '$is_correct'";
        mysqli_query($conn, $insert_answer_query);
    }

    // Calculate the score (assume each correct answer is worth 1 point)
    $score = $correct_answers;

    // Insert or update the results in the results table
    $insert_result_query = "INSERT INTO results (student_id, paper_id, total_questions, correct_answers, score, total_attended)
                            VALUES ('$student_id', '$paper_id', '$total_questions', '$correct_answers', '$score', '$total_attended')
                            ON DUPLICATE KEY UPDATE 
                            correct_answers = '$correct_answers', 
                            score = '$score', 
                            total_attended = '$total_attended'";
    mysqli_query($conn, $insert_result_query);

    // Redirect to a results page with summary
    header("Location: result.php?paper_id=$paper_id&score=$score&total_questions=$total_questions&correct_answers=$correct_answers&total_attended=$total_attended");
    exit;
} else {
    echo "Invalid request.";
    exit;
}
