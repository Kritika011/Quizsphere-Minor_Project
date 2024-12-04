<?php
// session_start();
include '../config.php';  // Include your database connection file

// Assuming the subject_id is passed as a GET parameter
$subject_id = isset($_GET['subject_id']) ? $_GET['subject_id'] : 0;

// Fetch subject details
$subject_query = "SELECT subject_name, subject_code, course, semester FROM subjects WHERE subject_id = $subject_id";
$subject_result = mysqli_query($conn, $subject_query);
$subject = mysqli_fetch_assoc($subject_result);

// Fetch all papers for the subject
$papers_query = "SELECT * FROM paperdetails WHERE subject_id = $subject_id";
$papers_result = mysqli_query($conn, $papers_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questionstatus.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <?php include '../Navber/adminnav.php'; ?>

    <h3 class="heading1"><?php echo $subject['subject_name'] . ": " . $subject['subject_code']; ?></h3>
    <p class="para1"><b>Sem: <?php echo $subject['semester']; ?></b></p>
    <p class="para2"><b>Course: <?php echo $subject['course']; ?></b></p>
    <br>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Paper Title</th>
                    <th>No of Questions</th>
                    <th>Marks per Question</th>
                    <th>Total Time</th>
                    <th>View Questions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($papers_result) > 0): ?>
                    <?php while ($paper = mysqli_fetch_assoc($papers_result)):
                        // Generate paper title dynamically
                        $paper_title = $subject['subject_name'] . " - Question Paper Set " . $paper['paper_id'];
                        ?>
                        <tr>
                            <td><?php echo $paper_title; ?></td>
                            <td><?php echo $paper['num_of_questions']; ?></td>
                            <td><?php echo $paper['marks_per_question']; ?></td>
                            <td><?php echo $paper['time_limit']; ?> mins</td>
                            <td>
                                <a href="../Admin_Allpages/questions.php?paper_id=<?php echo $paper['paper_id']; ?>"
                                    class="links">Open</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No papers available for this subject.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>