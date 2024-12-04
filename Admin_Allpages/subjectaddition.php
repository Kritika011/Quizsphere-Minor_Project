<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subjectaddition.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head <body>
<?php
// session_start();
include '../Navber/adminnav.php';
?>

<div id="form-making">
    <form action="#" method="post" enctype="multipart/form-data">

        <input class="input" type="text" name="subject_name" placeholder="Subject Name" required>
        <br><br>

        <input class="input" type="text" name="subject_code" placeholder="Subject Code" required>
        <br><br>

        <input class="input" type="text" name="course" placeholder="Course" required>
        <br><br>

        <input class="input" type="NUMBER" name="semester" placeholder="Semester" required>
        <br><br>

        <input class="input details" type="text" name="details" placeholder="Details" required>
        <br><br>

        <!-- <label for="id_card" class="input">Upload ID Card:</label> -->
        <input type="file" name="id_card" class="input image" accept="image/*" required>
        <br><br>

        <input class="btn" type="submit" name="submit" value="Submit">
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "quiz_website");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $details = $_POST['details'];

    // Handle file upload
    $id_card = $_FILES['id_card'];
    $id_card_path = "../uploads/" . basename($id_card["name"]);
    if (move_uploaded_file($id_card["tmp_name"], $id_card_path)) {
        // Insert into subjects table
        $stmt = $conn->prepare("INSERT INTO subjects (subject_name, subject_code, course, semester, details, id_card) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $subject_name, $subject_code, $course, $semester, $details, $id_card_path);

        if ($stmt->execute()) {
            $last_id = $conn->insert_id;  // Get the last inserted ID
            header("Location: ../Admin_Allpages/subjectaddition.php?subject_id=$last_id");
            exit(); // Make sure to exit after header redirection
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to upload the ID card image.";
    }

    $conn->close();
}
?>

</body>

</html>