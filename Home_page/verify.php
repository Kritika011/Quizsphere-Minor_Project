<?php
require '../config.php';
session_start();
$role = $_SESSION['role'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve email from session and token from form
    $email = $_SESSION['email'] ?? null;
    $entered_token = $_POST['otp'] ?? null;

    if (!$email || !$entered_token) {
        $error = "Invalid request. Please try again.";
    } else {
        // Dynamically select the table based on role
        if ($role === 'admin') {
            $table = 'admins';
        } elseif ($role === 'student' || $role === 'teacher') {
            $table = 'user';
        } else {
            $error = "Role not recognized.";
            echo $error;
            exit();
        }

        // Check the token in the database
        $query = $conn->prepare("
            SELECT 'admins' AS table_name, verification_token 
            FROM admins 
            WHERE email = ? 
            UNION 
            SELECT 'user'  AS table_name, verification_token 
            FROM user 
            WHERE email = ?
        ");
        $query = $conn->prepare("SELECT verification_token FROM $table WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if ($row['verification_token'] === $entered_token) {
                // Update verification status and clear the token
                $update = $conn->prepare("UPDATE $table SET is_verified = 1, verification_token = NULL WHERE email = ?");
                $update->bind_param("s", $email);
                $update->execute();


                // Redirect based on role          "Your admin account is not verified yet. Please wait for confirmation."
                if ($role === 'admin') {
                    // Admin role redirection
                    header("Location: ../Registration/adminregistration.php");
                } elseif ($role === 'student') {
                    // Student role redirection
                    header("Location: ../Registration/registration.php");
                } elseif ($_SESSION['role'] === 'teacher') {
                    // Teacher role redirection
                    header("Location: ../Registration/teachregister.php");
                } else {
                    $error = "Role not recognized.";
                }
                exit;
            } else {
                $error = "Invalid verification token. Please try again.";
            }
        } else {
            $error = "Email not found or already verified.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Token</title>
</head>

<body>
    <h2>Email Verification</h2>
    <?php if (isset($error))
        echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST">
        <label for="otp">Enter Verification Token:</label>
        <input type="text" id="otp" name="otp" required>
        <button type="submit">Verify</button>
    </form>
    <a href="../Home_page/index.php">Go to Home Page</a>
</body>

</html>