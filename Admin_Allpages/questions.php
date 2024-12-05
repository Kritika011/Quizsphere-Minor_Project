<?php
$editMode = isset($_GET['edit']); // Check if the page is in edit mode
include_once '../config.php';

include_once '../Navber/adminnav.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Get and validate paper_id
$paper_id = isset($_GET['paper_id']) ? intval($_GET['paper_id']) : 0;

// Check if paper_id is valid
if ($paper_id <= 0) {
    die("Invalid paper ID.");
}

// Fetch questions for the given paper_id
$sql = "SELECT * FROM exam_questions WHERE paper_id = $paper_id";
$result = $conn->query($sql);
if (!$result) {
    die("Error executing query: " . $conn->error);
}

$questionNumber = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Questions</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to external CSS -->
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css"> <!-- Link to external CSS -->
</head>

<body>

    <h1><?php echo $editMode ? "Edit Quiz Questions" : "Quiz Questions"; ?></h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<form action='submit_changes.php' method='post'>";
        echo "<input type='hidden' name='paper_id' value='$paper_id'>"; // Include paper_id in the form
        while ($row = $result->fetch_assoc()) {
            echo "<div class='question-container'>";
            echo "<label>Question " . $questionNumber . ":</label><br>";
            if ($editMode) {
                echo "<input type='text' name='question[" . $row['question_id'] . "]' value='" . $row['question'] . "'><br>";
            } else {
                echo "<p>" . $row['question'] . "</p>";
            }

            echo "<label>Option 1: </label><br>";
            echo $editMode ? "<input type='text' name='option1[" . $row['question_id'] . "]' value='" . $row['option1'] . "'><br>" : "<p>" . $row['option1'] . "</p>";

            echo "<label>Option 2: </label><br>";
            echo $editMode ? "<input type='text' name='option2[" . $row['question_id'] . "]' value='" . $row['option2'] . "'><br>" : "<p>" . $row['option2'] . "</p>";

            echo "<label>Option 3: </label><br>";
            echo $editMode ? "<input type='text' name='option3[" . $row['question_id'] . "]' value='" . $row['option3'] . "'><br>" : "<p>" . $row['option3'] . "</p>";

            echo "<label>Option 4: </label><br>";
            echo $editMode ? "<input type='text' name='option4[" . $row['question_id'] . "]' value='" . $row['option4'] . "'><br>" : "<p>" . $row['option4'] . "</p>";

            echo "<label>Correct Answer: </label><br>";
            echo $editMode ? "<input type='text' name='correct_answer[" . $row['question_id'] . "]' value='" . $row['correct_answer'] . "'><br>" : "<p>" . $row['correct_answer'] . "</p>";
            echo "</div>";
            $questionNumber++;
        }
        if ($editMode) {
            echo "<input type='submit' value='Submit Changes' class='button-style'>";
        }
        echo "</form>";
        if (!$editMode) {
            echo "<a href='questions.php?paper_id=$paper_id&edit=true'><button class='button-style'>Edit</button></a>";
        }
    } else {
        echo "<p>No questions found for this paper.</p>";
    }
    $conn->close();
    ?>
</body>

</html>