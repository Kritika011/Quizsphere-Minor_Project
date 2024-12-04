<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../Home_page/index.php"); // Redirect to login page if not logged in
//     exit;
// }

// echo "Logged-in user ID: " . $_SESSION['user_id'];
// echo "User role: " . $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
    <link rel="stylesheet" type="text/css" href="css/takequiz.css">
</head>

<body>
    <?php
    include '../config.php';  // Include your database connection file
    include '../Navber/nav.php';
    ?>
    <br>
    <?php
    // Fetch course and semester options dynamically from the database
    $course_query = "SELECT DISTINCT course FROM subjects";
    $semester_query = "SELECT DISTINCT semester FROM subjects";

    $course_result = mysqli_query($conn, $course_query);
    $semester_result = mysqli_query($conn, $semester_query);

    $selected_course = isset($_POST['course']) ? $_POST['course'] : '';
    $selected_semester = isset($_POST['semester']) ? $_POST['semester'] : '';

    // Fetch subjects based on the selected course and semester
    $subject_query = "SELECT * FROM subjects WHERE course = '$selected_course' AND semester = '$selected_semester'";
    $subject_result = mysqli_query($conn, $subject_query);
    ?>

    <!-- Dropdowns for Course and Semester -->
    <div class="dropdowns">
        <form method="post">
            <select name="course">
                <option value="">Select Course</option>
                <?php while ($row = mysqli_fetch_assoc($course_result)): ?>
                    <option value="<?php echo $row['course']; ?>" <?php if ($selected_course == $row['course'])
                           echo 'selected'; ?>>
                        <?php echo $row['course']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <select name="semester">
                <option value="">Select Semester</option>
                <?php while ($row = mysqli_fetch_assoc($semester_result)): ?>
                    <option value="<?php echo $row['semester']; ?>" <?php if ($selected_semester == $row['semester'])
                           echo 'selected'; ?>>
                        <?php echo $row['semester']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

    <!-- Subject Display Section -->
    <div class="container">
        <!-- Top section with 3 vertical boxes -->
        <div class="top-section">
            <?php
            if (mysqli_num_rows($subject_result) > 0):
                while ($subject = mysqli_fetch_assoc($subject_result)):
                    // Assuming 'id_card' contains the filename of the uploaded image
                    $id_card_image = $subject['id_card']; // Path to the image in the uploads folder
                    ?>
                    <div class="course-card">
                        <!-- Dynamically linking images based on course and semester -->
                        <img src="<?php echo $id_card_image; ?>" alt="ID Card" width="100" height="80">
                        <h3><?php echo $subject['subject_name']; ?></h3>
                        <p><?php echo $subject['details']; ?></p>

                        <form action="../Student_Allpage/questionstatus.php" method="get">
                            <input type="hidden" name="subject_id" value="<?php echo $subject['subject_id']; ?>">
                            <button class="btn" type="submit">Open</button>
                        </form>
                    </div>

                    <?php
                endwhile;
            else:
                ?>
                <p class="sub">No subjects available for the selected course and semester.</p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>