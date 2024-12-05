<?php
// Include the database connection
include '../config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

    $question_id = $_POST['question_id'];
    $paper_id = $_POST['paper_id'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_answer = $_POST['correct_answer'];
    if (empty($paper_id)) {
        die('Paper ID is missing!');
    }
    // Update the question in the database
    $query = "UPDATE exam_questions 
              SET option1 = ?, option2 = ?, option3 = ?, option4 = ?, correct_answer = ? 
              WHERE question_id = ? AND paper_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $option1, $option2, $option3, $option4, $correct_answer, $question_id, $paper_id);

    if ($stmt->execute()) {
        header("Location: ../Teacher_Allpage/questions.php?paper_id=$paper_id");
    } else {
        echo "Error updating question: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>