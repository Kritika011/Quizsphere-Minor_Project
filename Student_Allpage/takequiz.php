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
    include '../Navber/nav.php';
    ?>
    <br>
    <?php
    // Sample data for course and semester selection
    $subjects = [
        'BCF4SIM' => [
            'C Programming',
            'Data Structures',
            'Database Management',
            'Operating Systems'
        ]
    ];

    $selected_course = isset($_POST['course']) ? $_POST['course'] : '';
    $selected_semester = isset($_POST['semester']) ? $_POST['semester'] : '';
    $subject_list = [];

    if ($selected_course && $selected_semester && isset($subjects[$selected_course])) {
        $subject_list = $subjects[$selected_course];
    }
    ?>

    <!-- Dropdowns for Course and Semester -->
    <div class="dropdowns">
        <form method="post">
            <select name="course">
                <option value="">Select Course</option>
                <option value="BCF4SIM" <?php if ($selected_course == 'BCF4SIM')
                    echo 'selected'; ?>>BCA</option>
            </select>

            <select name="semester">
                <option value="">Select Semester</option>
                <option value="Semester 4" <?php if ($selected_semester == 'Semester 4')
                    echo 'selected'; ?>>Semester 4
                </option>
            </select>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

    <!-- Large Horizontal Box -->
    <div class="large-box">
        <?php if (!empty($subject_list)): ?>
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/C_Programming_Language.svg" alt="C Programming">
            <h3><?php echo $subject_list[0]; ?></h3>
            <p>Learn and test your skills in <?php echo $subject_list[0]; ?>.</p>
        <?php else: ?>
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/C_Programming_Language.svg" alt="C Programming">
            <h3>Course Details</h3>
            <p>Select a course and semester to see the subjects.</p>
        <?php endif; ?>
        <button class="btn">Open</button>
    </div>

    <div class="container">
        <!-- Top section with 3 vertical boxes -->
        <div class="top-section">
            <!-- Course 1 -->
            <div class="course-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/C_Programming_Language.svg"
                    alt="C Programming">
                <h3>C Programming</h3>
                <p>Test your skills in C programming. Multiple choice questions designed for all levels.</p>
                <form action="../Student_Allpage/questionstatus.php" method="get">
                    <input type="hidden" name="course" value="c_programming">
                    <button class="btn" type="submit"> Open</button>
                </form>
            </div>

            <div class="course-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/C_Programming_Language.svg"
                    alt="C Programming">
                <h3>C Programming</h3>
                <p>Test your skills in C programming. Multiple choice questions designed for all levels.</p>
                <form action="../Student_Allpage/questionstatus.php" method="get">
                    <input type="hidden" name="course" value="c_programming">
                    <button class="btn" type="submit">Open</button>
                </form>
            </div>

            <!-- Course 3 -->
            <div class="course-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/C_Programming_Language.svg"
                    alt="C Programming">
                <h3>C Programming</h3>
                <p>Test your skills in C programming. Multiple choice questions designed for all levels.</p>
                <form action="../Student_Allpage/questionstatus.php" method="get">
                    <input type="hidden" name="course" value="c_programming">
                    <button class="btn" type="submit">Open</button>
                </form>
            </div>
        </div>



</body>

</html>