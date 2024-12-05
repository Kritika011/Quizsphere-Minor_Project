<?php



include_once '../Navber/teachnav.php';
// Database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check connection
// Check connection\
include_once '../config.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get paper_id from URL
if (isset($_GET['paper_id']) && is_numeric($_GET['paper_id'])) {
    $paper_id = $_GET['paper_id'];

    // Query to fetch questions for the given paper_id
    $sql = "SELECT question, option1, option2, option3, option4 , correct_answer
            FROM exam_questions 
            WHERE paper_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $paper_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "    <title>QuizSphere</title>";
        echo '<link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">';
        echo ' <link rel="stylesheet" href="../Navber/style.css">';

        echo "<style>";
        echo "body { background-color: #333; color: white; font-family: Arial, sans-serif; }";
        echo ".question { margin-bottom: 20px; padding: 10px; border: 1px solid white; }";
        echo ".options { margin-left: 20px; }";
        echo "</style>";
        echo "</head>";
        echo "<body>";


        echo "<h1>Exam Questions</h1>";


        // Initialize question number
        $question_number = 1;

        // Fetch and display each question with its options
        while ($row = $result->fetch_assoc()) {
            echo "<div class='question'>";
            echo "<p><strong>Question $question_number:</strong> " . htmlspecialchars($row['question']) . "</p>";
            echo "<div class='options'>";
            echo "<p>Option 1. " . htmlspecialchars($row['option1']) . "</p>";
            echo "<p>option 2. " . htmlspecialchars($row['option2']) . "</p>";
            echo "<p>option 3. " . htmlspecialchars($row['option3']) . "</p>";
            echo "<p>option 4. " . htmlspecialchars($row['option4']) . "</p>";
            echo "<p> Answer .  " . $row['correct_answer'] . "</p>";
            echo "</div>";
            echo "</div>";

            // Increment question number
            $question_number++;
        }

        echo "</body>";
        echo "</html>";
    } else {
        echo "<p style='color: white;'>No questions found for this paper.</p>";
    }

    $stmt->close();
} else {
    echo "<p style='color: white;'>Invalid or missing paper_id in URL.</p>";
}

// Close connection
$conn->close();
?>