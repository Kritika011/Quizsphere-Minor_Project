<?php
// session_start();
include '../config.php';
require '../Navber/teachnav.php';

// Get the teacher's ID from the session
$teacher_id = $_SESSION['user_id'];

// Query to get paper details and subject information where submitted_by matches teacher_id
$sql = "
    SELECT pd.paper_id, pd.subject_id, pd.num_of_questions, pd.marks_per_question, pd.time_limit, 
           s.subject_code, s.subject_name, s.course, s.semester, s.details, s.id_card
    FROM paperdetails pd
    JOIN subjects s ON pd.subject_id = s.subject_id
    WHERE pd.submitted_by = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $teacher_id); // Bind teacher_id to the query
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/submitbytech.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>

<body>
    <h3 class="heading1">Paper Details submitted by you</h3>

    <?php
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Table header is placed once before the loop
        echo '<div class="content">';
        echo '<table>';
        echo '<thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>No of Questions</th>
                    <th>Marks per Question</th>
                    <th>Total Time</th>
                    <th>Student Attendants</th>
                    <th>View Details</th>
                </tr>
              </thead>';
        echo '<tbody>';

        // Loop through each row and display paper details
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['subject_code'] . '</td>';
            echo '<td>' . $row['subject_name'] . '</td>';
            echo '<td>' . $row['num_of_questions'] . '</td>';
            echo '<td>' . $row['marks_per_question'] . '</td>';
            echo '<td>' . $row['time_limit'] . '</td>';
            echo '<td><a href="#">View</a></td>';
            echo '<td><a href="../Teacher_Allpage/questions.php?paper_id=' . $row['paper_id'] . '">Open</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>No papers found for this teacher.</p>';
    }
    ?>

</body>

</html>

<?php
$stmt->close();
$conn->close();
?>