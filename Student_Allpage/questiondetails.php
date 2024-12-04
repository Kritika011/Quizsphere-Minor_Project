<?php
// echo "Logged-in user ID: " . $_SESSION['user_id'];
// echo "User role: " . $_SESSION['role'];

include '../config.php'; // Database connection

// Fetch subjects based on course and semester
$course_query = "SELECT DISTINCT course FROM subjects";
$semester_query = "SELECT DISTINCT semester FROM subjects";

$course_result = mysqli_query($conn, $course_query);
$semester_result = mysqli_query($conn, $semester_query);

$selected_course = isset($_POST['course']) ? $_POST['course'] : '';
$selected_semester = isset($_POST['semester']) ? $_POST['semester'] : '';
$paper_id = isset($_GET['paper_id']) ? intval($_GET['paper_id']) : 0;

// Fetch subjects
$subject_query = "SELECT * FROM subjects WHERE course = '$selected_course' AND semester = '$selected_semester'";
$subject_result = mysqli_query($conn, $subject_query);

// Fetch paper details if `paper_id` is set
if ($paper_id) {
    $paper_query = "SELECT p.*, s.subject_name, s.subject_code, s.course, s.semester 
                    FROM paperdetails p 
                    JOIN subjects s ON p.subject_id = s.subject_id 
                    WHERE p.paper_id = $paper_id";
    $paper_result = mysqli_query($conn, $paper_query);
    $paper = mysqli_fetch_assoc($paper_result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questiondetails.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">

</head>

<body>
    <?php include '../Navber/nav.php'; ?>

    <div class="container">
        <?php if (!$paper_id): ?>
            <h3 class="heading1">Available Subjects</h3>
            <div class="subjects">
                <?php while ($subject = mysqli_fetch_assoc($subject_result)): ?>
                    <div class="subject-card">
                        <h3><?php echo $subject['subject_name'] . " (" . $subject['subject_code'] . ")"; ?></h3>
                        <p><b>Semester:</b> <?php echo $subject['semester']; ?></p>
                        <p><b>Course:</b> <?php echo $subject['course']; ?></p>
                        <form action="" method="get">
                            <input type="hidden" name="paper_id" value="<?php echo $subject['subject_id']; ?>">
                            <button type="submit">View Papers</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if ($paper_id && $paper): ?>
            <div class="question-paper">
                <h3><?php echo $paper['subject_name']; ?> (<?php echo $paper['subject_code']; ?>)</h3>
                <p class="para1"><b>Semester:</b> <?php echo $paper['semester']; ?></p>
                <p class="para2"><b>Course:</b> <?php echo $paper['course']; ?></p>
                <br>
                <h2>Question Paper <?php echo $paper['paper_id']; ?></h2>
                <br>
                <p class="para1"><b>Number of Questions:</b> <?php echo $paper['num_of_questions']; ?></p>
                <p class="para2"><b>Total Time:</b> <?php echo $paper['time_limit']; ?> minutes</p>
                <h3 class="rule">Rules</h3>
                <br>
                <ul>
                    <li>Remain on the exam window at all times.</li>
                    <li>Do not use external devices or materials.</li>
                    <li>Maintain silence throughout the exam.</li>
                    <li>Your actions may be monitored for security purposes.</li>
                    <li>Focus on the screen; avoid looking away unnecessarily.</li>
                    <li>Manage your time effectively and submit carefully.</li>
                </ul>
                <a href="exam.php?paper_id=<?php echo $paper['paper_id']; ?>" class="btn">Start Exam</a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>