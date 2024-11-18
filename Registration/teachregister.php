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
        <form method="POST" action="register.php" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" name="name" required>
            </div>
            <div class="input-box">
                <label>Phone No</label>
                <input type="number" placeholder="Enter phone no" name="phoneno" required>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" value="<?php echo htmlspecialchars(string: $_SESSION['email']); ?>" name="email">
            </div>
            <div class="input-box">
                <label>Role</label>
                <input type="text" value="<?php echo htmlspecialchars($_SESSION['role']); ?>" name="role" disabled>
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
                    <label>Upload Profile Image : </label>
                    <input type="file" name="id_card" accept="image/*" class="id" required>
                </div>
            </div>



            <button type="submit">Submit</button>
        </form>
    </section>


</body>

</html>