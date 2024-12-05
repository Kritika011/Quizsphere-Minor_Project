<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../Navber/nav.php';
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// session_start();

// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
//     die("Unauthorized access or session not set.");
// }

$user_id = $_SESSION['user_id'];

$sql = "
    SELECT 
        user.name, 
        user.email, 
        studentdetails.phone_no, 
        studentdetails.dob, 
        studentdetails.gender, 
        studentdetails.course, 
        studentdetails.semester, 
        studentdetails.institute, 
        studentdetails.profile_image
    FROM 
        user 
    INNER JOIN 
        studentdetails 
    ON 
        user.id = studentdetails.user_id 
    WHERE 
        studentdetails.user_id = $user_id
";

$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Fetch a single row
} else {
    echo "No data found for student ID: $user_id";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            /* margin: 10px; */
            padding: 0;
            background-color: #333;
        }

        .profile-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .profile-image {
            display: block;
            margin: 0 auto 20px;
            border-radius: 50%;
            max-width: 150px;
        }

        .profile-data {
            text-align: left;
        }

        .profile-data div {
            margin-bottom: 10px;
        }

        .profile-data label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <img src="<?php echo $row['profile_image']; ?>" alt="../uploads" class="profile-image">
        <div class="profile-data">
            <div><label>Name:</label> <span><?php echo $row['name']; ?></span></div>
            <div><label>Email:</label> <span><?php echo $row['email']; ?></span></div>
            <div><label>Phone Number:</label> <span><?php echo $row['phone_no']; ?></span></div>
            <div><label>Date of Birth:</label> <span><?php echo $row['dob']; ?></span></div>
            <div><label>Gender:</label> <span><?php echo $row['gender']; ?></span></div>
            <div><label>Course:</label> <span><?php echo $row['course']; ?></span></div>
            <div><label>Semester:</label> <span><?php echo $row['semester']; ?></span></div>
            <div><label>Institute:</label> <span><?php echo $row['institute']; ?></span></div>
        </div>
    </div>
</body>

</html>