<?php
require '../config.php';

// Fetch unverified admins
$query = $conn->query("SELECT * FROM admins WHERE verified = 0");
$unverified_admins = $query->fetch_all(MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_admin'])) {
    $admin_id = intval($_POST['admin_id']);
    $conn->query("UPDATE admins SET verified = 1 WHERE id = $admin_id");
    header("Location: admin_verification.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Sphere</title>
</head>
<style></style>

<body>
    <h2>Admin Verification</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($unverified_admins as $admin): ?>
            <tr>
                <td><?= $admin['id'] ?></td>
                <td><?= $admin['name'] ?></td>
                <td><?= $admin['email'] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="admin_id" value="<?= $admin['id'] ?>">
                        <button type="submit" name="verify_admin">Verify</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>