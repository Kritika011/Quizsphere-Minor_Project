<?php
require '../config.php';   // Change to your DB name
require '../Navber/teachnav.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch teacher ID (you can get this from session or a GET parameter)
$teacher_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Ensure the role is `teacher`
if ($role !== 'teacher') {
    echo "Unauthorized access. Only teachers can view this page.";
    exit;
}

// Query to fetch data from `user` and `teacherdetails`
$sql = "
    SELECT 
        user.name, 
        user.email, 
        teacherdetails.phone_no, 
        teacherdetails.dob, 
        teacherdetails.gender, 
        teacherdetails.institute, 
        teacherdetails.profile_image
    FROM 
        user 
    INNER JOIN 
        teacherdetails 
    ON 
        user.id = teacherdetails.user_id 
    WHERE 
        teacherdetails.user_id = $teacher_id
";

$result = $conn->query($sql);

// Check if the teacher exists
if ($result->num_rows > 0) {
    $teacherData = $result->fetch_assoc();
} else {
    echo "No data found for teacher ID: $teacher_id";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
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
        <img src="<?php echo $teacherData['profile_image']; ?>" alt="Profile Image" class="profile-image">
        <div class="profile-data">
            <div><label>Name:</label> <span><?php echo $teacherData['name']; ?></span></div>
            <div><label>Email:</label> <span><?php echo $teacherData['email']; ?></span></div>
            <div><label>Phone Number:</label> <span><?php echo $teacherData['phone_no']; ?></span></div>
            <div><label>Date of Birth:</label> <span><?php echo $teacherData['dob']; ?></span></div>
            <div><label>Gender:</label> <span><?php echo $teacherData['gender']; ?></span></div>
            <div><label>Institute:</label> <span><?php echo $teacherData['institute']; ?></span></div>
        </div>
    </div>
</body>

</html>