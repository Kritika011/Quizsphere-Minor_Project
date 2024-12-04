<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questionformat.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <?php
    // session_start();
    include '../Navber/adminnav.php';
    include_once '../config.php';

    // Form submission handling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $subject_id = $_POST['subject'];
        $num_of_questions = $_POST['num_of_questions'];
        $marks_per_question = $_POST['marks_per_question'];
        $time_limit = $_POST['time_limit'];
        $submitted_by = 'admin'; // or set to logged-in user ID if available
    
        // Insert data into paperdetails table
        $stmt = $conn->prepare("INSERT INTO paperdetails (subject_id, num_of_questions, marks_per_question, time_limit, submitted_by) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $subject_id, $num_of_questions, $marks_per_question, $time_limit, $submitted_by);

        if ($stmt->execute()) {
            // Get the last inserted paper ID
            $paper_id = $conn->insert_id;

            // Redirect to questioninput.php with paper_id and num_of_questions as GET parameters
            header("Location: questioninput.php?paper_id=$paper_id&num_of_questions=$num_of_questions");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }

    // Fetch subjects for dropdown
    $subjects = [];
    $query = "SELECT subject_id, subject_name, subject_code FROM subjects";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subjects[] = $row;
        }
    }
    ?>

    <div id="form-making">
        <form action="" method="post"> <!-- Form submits to this page itself -->
            <select id="subjects" name="subject" required onchange="syncSubjectCode(this.value)">
                <option hidden>Select Subject Name</option>
                <?php foreach ($subjects as $subject) { ?>
                    <option value="<?php echo $subject['subject_id']; ?>"
                        data-code="<?php echo $subject['subject_code']; ?>">
                        <?php echo $subject['subject_name']; ?>
                    </option>
                <?php } ?>
            </select>
            <br><br>

            <select id="subject-code" name="subject_code" required onchange="syncSubjectName(this.value)">
                <option hidden>Select Subject Code</option>
                <?php foreach ($subjects as $subject) { ?>
                    <option value="<?php echo $subject['subject_id']; ?>"
                        data-name="<?php echo $subject['subject_name']; ?>">
                        <?php echo $subject['subject_code']; ?>
                    </option>
                <?php } ?>
            </select>
            <br><br>

            <input id="num_questions" class="input" type="number" name="num_of_questions" placeholder="No of Questions"
                required>
            <br><br>

            <input id="marks_per_question" class="input" type="number" name="marks_per_question"
                placeholder="Marks per Question" required>
            <br><br>

            <input id="time_limit" class="input" type="text" name="time_limit" pattern="[0-9]{2}:[0-9]{2}"
                placeholder="e.g., 40:00" required>
            <br><br>

            <input class="btn" type="submit" name="submit" value="Submit">
        </form>
    </div>

    <script>
        function syncSubjectCode(subjectId) {
            const subjectSelect = document.getElementById("subjects");
            const codeSelect = document.getElementById("subject-code");
            const selectedOption = subjectSelect.querySelector(`option[value="${subjectId}"]`);

            if (selectedOption) {
                codeSelect.value = subjectId;
            }
        }

        function syncSubjectName(subjectId) {
            const subjectSelect = document.getElementById("subjects");
            const codeSelect = document.getElementById("subject-code");
            const selectedOption = codeSelect.querySelector(`option[value="${subjectId}"]`);

            if (selectedOption) {
                subjectSelect.value = subjectId;
            }
        }
    </script>
</body>

</html>