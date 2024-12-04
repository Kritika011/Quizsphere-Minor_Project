<?php
session_start();
require '../config.php';

// Check if user data is available in the session
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    // Redirect to signup page or show an error
    header("Location: ../Home_page/index.php");
    exit();
}

// Retrieve session variables
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];
$name = $_SESSION['name'];

// Use these variables as needed in your registration logic
?>
<?php
// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Get the user ID from the session
    $phone_no = htmlspecialchars($_POST['phoneno']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $institute = htmlspecialchars($_POST['institute']);

    // Upload profile image
    $target_dir = "../uploads/"; // Change this to your desired directory
    $profile_image = $target_dir . basename($_FILES["id_card"]["name"]);
    move_uploaded_file($_FILES["id_card"]["tmp_name"], $profile_image);

    try {
        // Insert student details
        $query = $conn->prepare("
            INSERT INTO teacherdetails 
            (user_id, phone_no, dob, gender, institute, profile_image)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $query->bind_param("isssss", $user_id, $phone_no, $dob, $gender, $institute, $profile_image);
        $query->execute();

        $_SESSION['message'] = "Registration successful!";
        header("Location: ../Teacher_home_page/teacherhome.php"); // Redirect to student dashboard
        exit();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: ../Registration/teachregister.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylereg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="icon.jpg" type="image/x-icon">
</head>
<style>

</style>

<body>
    <section class="container">
        <h2>Registration Form</h2>
        <form method="POST" enctype="multipart/form-data" class="form">

            <div class="input-box">
                <label>Full Name</label>
                <input type="text" value="<?php echo htmlspecialchars($name); ?>" name="name" readonly>
            </div>
            <div class="input-box">
                <label>Phone No</label>
                <input type="number" placeholder="Enter phone no" name="phoneno" required>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" value="   <?php echo htmlspecialchars($email); ?>" name="email" readonly>
            </div>
            <div class="input-box">
                <label>Role</label>
                <input type="text" value="<?php echo htmlspecialchars($_SESSION['role']); ?>" name="role" disabled
                    readonly>
            </div>

            <div class="input-box">
                <label>Date of Birth</label>
                <input type="date" name="dob" required style="color:black;">
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="male" required>
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="female">
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gender" value="other">
                        <label for="check-other">Other</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-prefer-not" name="gender" value="prefer-not">
                        <label for="check-prefer-not">Prefer not to say</label>
                    </div>
                </div>
            </div>



            <!-- Teacher Fields -->
            <div id="teacherFields">
                <div class="input-box">
                    <label>Institute Name</label>
                    <input type="text" placeholder="Enter Institute Name" name="institute" required>
                </div>
                <div class="input-box">
                    <label>Upload Profile Image :</label>
                    <input type="file" name="id_card" class="id" accept="image/*" required>
                </div>


            </div>



            <button type="submit">Submit</button>
        </form>

    </section>

</body>

</html>