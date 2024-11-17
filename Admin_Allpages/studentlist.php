<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subjectlist.css">
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
    <style>
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .table-container {
            width: 80%;
            margin-top: 20px;
            display: none;
            /* Initially hide both tables */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        .button-group {
            margin-top: 20px;
        }

        .button-group button {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .active-table {
            display: block;
            /* Display the selected table */
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include '../Navber/adminnav.php';
    ?>

    <div class="container">
        <div class="button-group">
            <button onclick="showTable('teacher')">Teacher</button>
            <button onclick="showTable('student')">Student</button>
        </div>

        <!-- Teacher Table -->
        <div id="teacher-table" class="table-container">
            <h2>Manage Teachers</h2>
            <?php
            include '../config.php';
            $sql_teacher = "SELECT * FROM user WHERE role='teacher' ORDER BY name ASC";
            $result_teacher = $conn->query($sql_teacher);

            if ($result_teacher->num_rows > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $result_teacher->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["id"] . "</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "No teachers found.";
            }
            ?>
        </div>

        <!-- Student Table -->
        <div id="student-table" class="table-container">
            <h2>Manage Students</h2>
            <?php
            $sql_student = "SELECT * FROM user WHERE role='student' ORDER BY name ASC";
            $result_student = $conn->query($sql_student);

            if ($result_student->num_rows > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $result_student->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["id"] . "</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "No students found.";
            }
            ?>
        </div>
    </div>

    <script>
        // Function to toggle the visibility of the tables
        function showTable(role) {
            // Hide both tables initially
            document.getElementById("teacher-table").classList.remove("active-table");
            document.getElementById("student-table").classList.remove("active-table");

            // Show the selected table
            if (role === "teacher") {
                document.getElementById("teacher-table").classList.add("active-table");
            } else {
                document.getElementById("student-table").classList.add("active-table");
            }
        }
    </script>
</body>

</html>