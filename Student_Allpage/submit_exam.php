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
    // Fetch all questions and options for the given paper_id
    $questions_query = "SELECT question_id, option1, option2, option3, option4, correct_answer FROM exam_questions WHERE paper_id = ?";
    $stmt = mysqli_prepare($conn, $questions_query);
    mysqli_stmt_bind_param($stmt, 'i', $paper_id);
    mysqli_stmt_execute($stmt);
    $questions_result = mysqli_stmt_get_result($stmt);

    $total_questions = mysqli_num_rows($questions_result);
    $correct_answers = 0;
    $total_attended = 0;

    while ($row = mysqli_fetch_assoc($questions_result)) {
        $question_id = $row['question_id'];
        $correct_answer = $row['correct_answer']; // correct_answer stores option1, option2, option3, or option4

        // Get the student's selected answer (should match option1, option2, option3, or option4)
        $student_answer = isset($_POST["answer$question_id"]) ? $_POST["answer$question_id"] : null;

        // Determine the correctness of the answer (match student answer with the correct option)
        $is_correct = ($student_answer === $correct_answer) ? 1 : 0;
        if ($student_answer !== null) {
            $total_attended++;
        }
        if ($is_correct) {
            $correct_answers++;
        }

        // Insert or update the answer in the exam_answers table using prepared statements
        $status = ($student_answer !== null) ? 'attended' : 'unattended';
        $insert_answer_query = "INSERT INTO exam_answers (student_id, question_id, answer, status, is_correct)
                                VALUES (?, ?, ?, ?, ?)
                                ON DUPLICATE KEY UPDATE 
                                answer = ?, 
                                status = ?, 
                                is_correct = ?";
        $stmt = mysqli_prepare($conn, $insert_answer_query);
        mysqli_stmt_bind_param($stmt, 'iissisis', $student_id, $question_id, $student_answer, $status, $is_correct, $student_answer, $status, $is_correct);
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error: " . mysqli_error($conn);
            exit;
        }
    }

    // Calculate the score (assume each correct answer is worth 1 point)
    $score = $correct_answers;

    // Insert or update the results in the results table using prepared statements
    $insert_result_query = "INSERT INTO results (student_id, paper_id, total_questions, correct_answers, score, total_attended)
                            VALUES (?, ?, ?, ?, ?, ?)
                            ON DUPLICATE KEY UPDATE 
                            correct_answers = ?, 
                            score = ?, 
                            total_attended = ?";
    $stmt = mysqli_prepare($conn, $insert_result_query);
    mysqli_stmt_bind_param($stmt, 'iiisiisii', $student_id, $paper_id, $total_questions, $correct_answers, $score, $total_attended, $correct_answers, $score, $total_attended);
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // Redirect to a results page with summary
    header("Location: result.php?paper_id=$paper_id&score=$score&total_questions=$total_questions&correct_answers=$correct_answers&total_attended=$total_attended");
    exit;
} else {
    echo "Invalid request.";
    exit;
}
?>