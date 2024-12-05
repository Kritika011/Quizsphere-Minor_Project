<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questioninput.css">
    <title>QuizSphere - Enter Questions</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <?php
    // session_start();
    include '../Navber/teachnav.php';
    include_once '../config.php'; ?>
    <?php
    $num_of_questions = isset($_GET['num_of_questions']) ? (int) $_GET['num_of_questions'] : 0;
    $paper_id = isset($_GET['paper_id']) ? (int) $_GET['paper_id'] : 0;
    ?>


    <div id="section2">
        <h2>Enter Your Questions</h2>


        <form
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?num_of_questions=$num_of_questions&paper_id=$paper_id"; ?>"
            method="post">
            <?php for ($i = 1; $i <= $num_of_questions; $i++) { ?>
                <div class="question-block">
                    <label class="label1">Enter Question <?php echo $i; ?></label>
                    <input class="input" type="text" name="question[]" required><br>

                    <label class="label2">Option 1</label>
                    <input class="input2" type="text" name="option1[]" required><br>

                    <label class="label2">Option 2</label>
                    <input class="input2" type="text" name="option2[]" required><br>

                    <label class="label2">Option 3</label>
                    <input class="input2" type="text" name="option3[]" required><br>

                    <label class="label2">Option 4</label>
                    <input class="input2" type="text" name="option4[]" required><br>

                    <label class="label2">Correct Answer</label>
                    <!-- <input class="input2" type="text" name="correct_answer[]" required><br><br> -->
                    <select class="input2" name="correct_answer[]" required>
                        <option value="Option1">Option 1</option>
                        <option value="Option2">Option 2</option>
                        <option value="Option3">Option 3</option>
                        <option value="Option4">Option 4</option>
                    </select><br><br>
                </div>
            <?php } ?>
            <input class="btn" type="submit" name="submit" value="Save Questions">
        </form>
    </div>
</body>

</html>
<?php
// Assuming num_of_questions is passed via URL or POST from previous form
echo "Number of Questions: " . $num_of_questions;

$num_of_questions = isset($_GET['num_of_questions']) ? (int) $_GET['num_of_questions'] : 0;
$paper_id = isset($_GET['paper_id']) ? (int) $_GET['paper_id'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to insert questions into database
    include_once '../config.php';
    echo "Number of Questions: " . $num_of_questions;

    for ($i = 0; $i < $num_of_questions; $i++) {
        $question = $_POST["question"][$i];
        $option1 = $_POST["option1"][$i];
        $option2 = $_POST["option2"][$i];
        $option3 = $_POST["option3"][$i];
        $option4 = $_POST["option4"][$i];
        $correct_answer = $_POST["correct_answer"][$i];

        $stmt = $conn->prepare("INSERT INTO exam_questions (paper_id, question, option1, option2, option3, option4, correct_answer) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $paper_id, $question, $option1, $option2, $option3, $option4, $correct_answer);
        if ($stmt->execute()) {
            echo "Question $i saved successfully!<br>";
        } else {
            echo "Error saving question $i: " . $stmt->error . "<br>";
        }

    }
    $conn->close();
    echo "Questions successfully saved!";
    exit;
}
?>