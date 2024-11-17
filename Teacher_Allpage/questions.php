<?php
$editMode = isset($_GET['edit']); // Check if the page is in edit mode
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Questions</title>
    <link rel="stylesheet" href="css/style.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css"> <!-- Link to external CSS -->
</head>

<body>
    <h1><?php echo $editMode ? "Edit Quiz Questions" : "Quiz Questions"; ?></h1>

    <?php
    include_once '../config.php';

    // Fetch questions
    $sql = "SELECT * FROM exam_questions";
    $result = $conn->query($sql);
    $questionNumber = 1;

    if ($result->num_rows > 0) {
        echo "<form action='submit_changes.php' method='post'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='question-container'>";
            echo "<label>Question " . $questionNumber . ":</label><br>";
            if ($editMode) {
                echo "<input type='text' name='question[" . $row['id'] . "]' value='" . $row['question'] . "'><br>";
            } else {
                echo "<p>" . $row['question'] . "</p>";
            }

            echo "<label>Option 1: </label><br>";
            echo $editMode ? "<input type='text' name='option1[" . $row['id'] . "]' value='" . $row['option1'] . "'><br>" : "<p>" . $row['option1'] . "</p>";

            echo "<label>Option 2: </label><br>";
            echo $editMode ? "<input type='text' name='option2[" . $row['id'] . "]' value='" . $row['option2'] . "'><br>" : "<p>" . $row['option2'] . "</p>";

            echo "<label>Option 3: </label><br>";
            echo $editMode ? "<input type='text' name='option3[" . $row['id'] . "]' value='" . $row['option3'] . "'><br>" : "<p>" . $row['option3'] . "</p>";

            echo "<label>Option 4: </label><br>";
            echo $editMode ? "<input type='text' name='option4[" . $row['id'] . "]' value='" . $row['option4'] . "'><br>" : "<p>" . $row['option4'] . "</p>";

            echo "<label>Correct Answer: </label><br>";
            echo $editMode ? "<input type='text' name='correct_answer[" . $row['id'] . "]' value='" . $row['correct_answer'] . "'><br>" : "<p>" . $row['correct_answer'] . "</p>";
            echo "</div>";
            $questionNumber++;
        }
        if ($editMode) {
            echo "<input type='submit' value='Submit Changes' class='button-style'>";
        }
        echo "</form>";
        if (!$editMode) {
            echo "<a href='questions.php?edit=true'><button class='button-style'>Edit</button></a>";
        }
    } else {
        echo "<p>No questions found</p>";
    }
    $conn->close();
    ?>
</body>

</html>