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
        <h2>Registration form</h2>
        <form method="POST" action="register.php" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" required />
            </div>
            <div class="input-box">
                <label>Phone No</label>
                <input type="number" placeholder="Enter phone no" required />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="text" placeholder="Enter your Email ID" required />
            </div>


            <div class="input-box">
                <label>Date of Birth</label>
                <input type="date" placeholder="Enter date of Birth" required />
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender">
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender">
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gender">
                        <label for="check-other">Other</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-others" name="gender">
                        <label for="check-other">Prefer not to say</label>
                    </div>
                </div>
            </div>

            <div class="input-box addres">
                <label>Address</label>
                <div class="column">
                    <div class="select-box">
                        <select>
                            <option hidden>Enter your Country</option>
                            <option>India</option>
                        </select>
                    </div>

                    <div class="select-box">
                        <select>
                            <option hidden>Enter your State</option>
                            <option>West Bengal</option>
                            <option>Andhra Pradesh</option>
                            <option>Arunachal Pradesh</option>
                            <option>Assam</option>
                            <option>Bihar</option>
                            <option>Chhattisgarh</option>
                            <option>Goa</option>
                            <option>Gujarat</option>
                            <option>Haryana</option>
                            <option>Himachal Pradesh</option>
                            <option>Jharkhand</option>
                            <option>Karnataka</option>
                            <option>Madhya Pradesh</option>
                            <option>Maharashtra</option>
                            <option>Manipur</option>
                            <option>Meghalaya</option>
                            <option>Mizoram</option>
                            <option>Nagaland</option>
                            <option>Odisha</option>
                            <option>Rajasthan</option>
                            <option>Sikkim</option>
                            <option>Tamil Nadu</option>
                            <option>Telangana</option>
                            <option>Tripura</option>
                            <option>Uttarakhand</option>
                            <option>Uttar Pradesh</option>
                    
                        </select>
                    </div>

                </div>


                <input type="text" placeholder="Enter your city" required />
                <input type="text" placeholder="Enter your pincode" required />
            </div>

            <div class="input-box addres">
                <label for="role">Select Role:</label>
                <div class="select-box">
                    <select name="role" id="role" required>
                        <option value="">--Select Role--</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <!-- <option value="admin">Admin</option> -->
                    </select>
                </div>
            </div>



            <!-- Role-Specific Fields -->
            <div id="studentFields" style="display:none;">
                <div class="input-box">
                    <label>Institute Name</label>
                    <input type="text" placeholder="Enter full name" required />
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>Course</label>
                        <div class="select-box">
                            <select>
                                <option hidden>Choose Course</option>
                                <option>BCA</option>
                                <option>BBA</option>
                                <option>MCA</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <label>Semester</label>
                        <div class="select-box">
                            <select>
                                <option hidden>Choose semester</option>
                                <option>1st</option>
                                <option>2nd</option>
                                <option>3rd</option>
                                <option>4th</option>
                                <option>5th</option>
                                <option>6th</option>
                            </select>
                        </div>
                    </div>
                </div>



            </div>

            <div id="teacherFields" style="display:none;">
                <div class="input-box">
                    <label>Institute Name</label>
                    <input type="text" placeholder="Enter full name" required />
                </div>


                <div class="card_img">
                    <label for="id_card" class="card">Upload ID Card:</label>
                    <input type="file" name="id_card" id="id_card" accept="image/*" required>
                </div>
            </div>


            <!-- <div id="adminFields" style="display:none;">
            <input type="text" name="department" placeholder="Department">
        </div>

        <br> -->

            <button>Submit</button>
        </form>
    </section>

    <script>
        // JavaScript to show/hide fields based on role selection
        document.getElementById('role').addEventListener('change', function () {
            var studentFields = document.getElementById('studentFields');
            var teacherFields = document.getElementById('teacherFields');
            // var adminFields = document.getElementById('adminFields');

            studentFields.style.display = 'none';
            teacherFields.style.display = 'none';
            // adminFields.style.display = 'none';

            if (this.value == 'student') {
                studentFields.style.display = 'block';
            } else if (this.value == 'teacher') {
                teacherFields.style.display = 'block';
            }
            //  else if (this.value == 'admin') {
            //     adminFields.style.display = 'block';
            // }
        });
    </script>

</body>

</html>