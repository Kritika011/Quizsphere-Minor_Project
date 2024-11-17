<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'college';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Loop through each question and update database
foreach ($_POST['question'] as $id => $question) {
    $option1 = $_POST['option1'][$id];
    $option2 = $_POST['option2'][$id];
    $option3 = $_POST['option3'][$id];
    $option4 = $_POST['option4'][$id];
    $correct_answer = $_POST['correct_answer'][$id];

    $sql = "UPDATE exam_questions SET 
                question = '$question', 
                option1 = '$option1', 
                option2 = '$option2', 
                option3 = '$option3', 
                option4 = '$option4', 
                correct_answer = '$correct_answer' 
            WHERE id = $id";
    $conn->query($sql);
}

$conn->close();
header("Location: questions.php"); // Redirect back to view-only mode
?>