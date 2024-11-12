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
                <input type="text" placeholder="Enter full name" name="name" required >
            </div>
            <div class="input-box">
                <label>Phone No</label>
                <input type="number" placeholder="Enter phone no"  name="phoneno " required >
            </div>

            <!-- <div class="input-box">
                <label>Email Address</label>
                <input type="text" placeholder="Enter your Email ID" name="email"  required >
            </div> -->


            <div class="input-box">
                <label>Date of Birth</label>
                <input type="date" placeholder="Enter date of Birth" name="dob"  required >
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
            <br>

            <div class="input-box addres">
                <label for="address">Address</label>
                <div class="column">
                   
                   <div class="input-box">
                      <!-- <label>Enter Your State</label> -->
                      <input type="text" placeholder="Enter your country" name="country">
                    </div>

                    <div class="input-box">
                      <!-- <label>Enter Your State</label> -->
                      <input type="text" placeholder="Enter your State" name="state">
                    </div>
                </div>

                <br>


                <input type="text" placeholder="Enter your city"  name="city" required />
                <input type="text" placeholder="Enter your pincode" name="pincode" required />
            </div>

           



            <!-- Role-Specific Fields -->
            <div id="studentFields" style="display: ;">
                

                <div class="column">
                    <div class="input-box">
                        <label for="course">Course</label>
                        <div class="select-box">
                            <select id="course" name="course">
                                <option hidden>Choose Course</option>
                                <option value="bca">BCA</option>
                                <option value="bba">BBA</option>
                                <option value="mca">MCA</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="sem">Semester</label>
                        <div class="select-box">
                            <select id="sem" name="sem">
                                <option hidden>Choose semester</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="input-box addres">
                   <label for="role">University roll No. :</label>
                   <input type="text" placeholder="Enter University Roll No." name="rollno" required />
                </div>

                <div class="input-box">
                    <label>Institute Name</label>
                    <input type="text" placeholder="Enter full name"  name="institute" required />
                </div>



            </div>

            <!-- <div id="teacherFields" style="display: ;">
                <div class="input-box">
                    <label>Institute Name</label>
                    <input type="text" placeholder="Enter full name" required />
                </div> -->
                <br>


                <div class="card_img">
                    <label for="id_card" class="card">Upload ID Card:</label>
                    <input type="file" name="id_card" id="id_card" accept="image/*" required>
                </div>
            </div>
            <br>

            <!-- <div class="input-box" style="display: ;">
                <label for="department">Department Name </label>
                <input type="text" name="department" placeholder="Department" id="department">
            </div> -->

        <br>

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