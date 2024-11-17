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
                <input type="email" placeholder="Enter your Email ID" name="email" required>
            </div>
            <div class="input-box">
                <label>Date of Birth</label>
                <input type="date" name="dob" required>
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

            <div class="input-box">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option hidden>Choose Role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Student Fields -->
            <div id="studentFields" style="display: none;">
                <div class="input-box">
                    <label>Course</label>
                    <select name="course">
                        <option hidden>Choose Course</option>
                        <option value="bca">BCA</option>
                        <option value="bba">BBA</option>
                        <option value="mca">MCA</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Semester</label>
                    <select name="semester">
                        <option hidden>Choose Semester</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>University Roll No.</label>
                    <input type="text" placeholder="Enter University Roll No." name="rollno" required>
                </div>
                <div class="input-box">
                    <label>Institute Name</label>
                    <input type="text" placeholder="Enter Institute Name" name="institute" required>
                </div>
            </div>

            <!-- Teacher Fields -->
            <div id="teacherFields" style="display: none;">
                <div class="input-box">
                    <label>Institute Name</label>
                    <input type="text" placeholder="Enter Institute Name" name="institute" required>
                </div>
                <div class="input-box">
                    <label>Upload ID Card</label>
                    <input type="file" name="id_card" accept="image/*" required>
                </div>
            </div>

            <!-- Admin Fields -->
            <div id="adminFields" style="display: none;">
                <div class="input-box">
                    <label>Admin Access Code</label>
                    <input type="text" placeholder="Enter Admin Access Code" name="access_code" required>
                </div>
                <div class="input-box">
                    <label>Department</label>
                    <input type="text" placeholder="Enter Department" name="department" required>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </section>

    <script>
        // JavaScript for role-based field visibility
        document.getElementById('role').addEventListener('change', function () {
            var studentFields = document.getElementById('studentFields');
            var teacherFields = document.getElementById('teacherFields');
            var adminFields = document.getElementById('adminFields');

            // Hide all fields initially
            studentFields.style.display = 'none';
            teacherFields.style.display = 'none';
            adminFields.style.display = 'none';

            // Show fields based on selected role
            if (this.value === 'student') {
                studentFields.style.display = 'block';
            } else if (this.value === 'teacher') {
                teacherFields.style.display = 'block';
            } else if (this.value === 'admin') {
                adminFields.style.display = 'block';
            }
        });
    </script>
</body>

</html>