<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "college");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch questions from the database
$questions = [];
$sql = "SELECT * FROM questions LIMIT 10"; // Adjust the limit as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Interface</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add styles here as per the previous example */
    </style>
</head>

<body>
    <div class="quiz-container">
        <div class="timer">Time Left: <span id="time">39:30 mins</span></div>
        <h2>Question Paper Set 1</h2>

        <?php foreach ($questions as $index => $question): ?>
            <div class="question">
                <p><span class="question-number"><?php echo $index + 1; ?>.</span> <?php echo $question['question']; ?></p>
                <div class="options">
                    <label><input type="radio" name="question<?php echo $index; ?>" value="a">
                        <?php echo $question['option_a']; ?></label>
                    <label><input type="radio" name="question<?php echo $index; ?>" value="b">
                        <?php echo $question['option_b']; ?></label>
                    <label><input type="radio" name="question<?php echo $index; ?>" value="c">
                        <?php echo $question['option_c']; ?></label>
                    <label><input type="radio" name="question<?php echo $index; ?>" value="d">
                        <?php echo $question['option_d']; ?></label>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="navigation">
            <button class="button save" onclick="saveAndNext()">Save & Next</button>
            <button class="button review" onclick="markForReview()">Mark for Review</button>
            <button class="button submit" onclick="submitQuiz()">Submit</button>
        </div>

        <div class="status">
            <div class="status-box attended">Attended: <span id="attended">0</span></div>
            <div class="status-box unattended">Unattended: <span id="unattended"><?php echo count($questions); ?></span>
            </div>
            <div class="status-box marked-for-review">Marked for review: <span id="review">0</span></div>
        </div>
    </div>

    <script>
        let attendedCount = 0;
        let unattendedCount = <?php echo count($questions); ?>;
        let reviewCount = 0;

        function updateStatus() {
            document.getElementById("attended").textContent = attendedCount;
            document.getElementById("unattended").textContent = unattendedCount;
            document.getElementById("review").textContent = reviewCount;
        }

        function saveAndNext() {
            const options = document.querySelectorAll('input[type="radio"]');
            let answered = false;
            options.forEach(option => {
                if (option.checked) answered = true;
            });

            if (answered) {
                attendedCount++;
                unattendedCount = Math.max(unattendedCount - 1, 0);
                updateStatus();
                alert("Answer saved.");
            } else {
                alert("Please select an option.");
            }
        }

        function markForReview() {
            reviewCount++;
            unattendedCount = Math.max(unattendedCount - 1, 0);
            updateStatus();
            alert("Question marked for review.");
        }

        function submitQuiz() {
            if (confirm("Are you sure you want to submit the quiz?")) {
                alert("Quiz submitted. Thank you!");
                // Submit data to the backend using AJAX or a form post
            }
        }

        // Timer functionality (decrement every second)
        let time = 2370; // in seconds, e.g., 39:30 minutes
        setInterval(() => {
            if (time <= 0) {
                alert("Time's up! Submitting quiz.");
                submitQuiz();
            } else {
                time--;
                let minutes = Math.floor(time / 60);
                let seconds = time % 60;
                document.getElementById("time").textContent = ${ minutes }:${ seconds < 10 ? '0' + seconds : seconds } mins;
            }
        }, 1000);
    </script>
</body>

</html>