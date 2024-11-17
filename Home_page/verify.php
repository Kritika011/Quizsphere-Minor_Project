<?php
session_start();
require '../config.php'; // Include database connection
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require '../path/to/PHPMailer/src/Exception.php';
require '../path/to/PHPMailer/src/PHPMailer.php';
require '../path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify'])) {
    $email = $_SESSION['email'] ?? null; // Retrieve email from session
    $code = htmlspecialchars($_POST['verification_code']);

    if ($email) {
        // Check if the code matches
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND verification_code = ? AND verified = 0");
        $stmt->bind_param("ss", $email, $code);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Update verified status if the code matches
            $update_stmt = $conn->prepare("UPDATE users SET verified = 1 WHERE email = ?");
            $update_stmt->bind_param("s", $email);
            $update_stmt->execute();

            $_SESSION['message'] = "Your account has been verified! You can now log in.";
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['error'] = "Invalid verification code or already verified.";
        }
    } else {
        $_SESSION['error'] = "Session expired. Please try again.";
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Account</title>
</head>

<body>
    <h2>Email Verification</h2>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['message'])) {
        echo "<p style='color:green;'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <form method="POST">
        <label for="verification_code">Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" required>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>

</html>