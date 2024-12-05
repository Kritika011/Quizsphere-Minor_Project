<?php
require '../config.php';   // Change to your DB name
require '../Navber/adminnav.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin ID (you can get this from session or a GET parameter)
$admin_id = $_SESSION['user_id'];
$role = $_SESSION['role']; // Role of the user (admin)

// Ensure the role is `admin`
if ($role !== 'admin') {
    echo "Unauthorized access. Only admins can view this page.";
    exit;
}

// Query to fetch data from `admins` and `admindetails`
$sql = "
    SELECT 
        admins.name, 
        admins.email, 
        admindetails.phone_no, 
        admindetails.dob, 
        admindetails.gender, 
        admindetails.institute, 
        admindetails.profile_image,
        admins.verified
    FROM 
        admins 
    INNER JOIN 
        admindetails 
    ON 
        admins.id = admindetails.user_id 
    WHERE 
        admindetails.user_id = $admin_id
";

$result = $conn->query($sql);

// Check if the admin exists
if ($result->num_rows > 0) {
    $adminData = $result->fetch_assoc();
} else {
    echo "No data found for admin ID: $admin_id";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
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
        <img src="<?php echo $adminData['profile_image']; ?>" alt="Profile Image" class="profile-image">
        <div class="profile-data">
            <div><label>Name:</label> <span><?php echo $adminData['name']; ?></span></div>
            <div><label>Email:</label> <span><?php echo $adminData['email']; ?></span></div>
            <div><label>Phone Number:</label> <span><?php echo $adminData['phone_no']; ?></span></div>
            <div><label>Date of Birth:</label> <span><?php echo $adminData['dob']; ?></span></div>
            <div><label>Gender:</label> <span><?php echo $adminData['gender']; ?></span></div>
            <div><label>Institute:</label> <span><?php echo $adminData['institute']; ?></span></div>
            <div><label>Profile Verified:</label> <span><?php echo $adminData['verified'] ? 'Yes' : 'No'; ?></span>
            </div>
        </div>
    </div>
</body>

</html>