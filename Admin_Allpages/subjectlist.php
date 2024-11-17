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
        .containt {
            width: 100%;
            flex-direction: row;
            display: flex;
            margin: auto;
            align-items: center;
            text-align: center;
            justify-content: center;
        }

        .left {
            margin: auto;
            align-items: center;
            width: 50%;
            text-align: center;
            justify-content: center;
            padding: 1.5vw;
            /* background-color: #444; */
            color: white;
        }

        .right {
            margin: auto;
            align-items: center;
            width: 50%;
            text-align: center;
            justify-content: center;
            padding: 1.5vw;
            /* background-color: #444; */
            color: white;
        }

        input {
            background-color: #333;
            padding: 0.5vw;
            color: white;
        }

        ::placeholder {
            background-image: #333;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include '../Navber/adminnav.php';
    ?>
    <?php
    include_once '../config.php';
    ?>
    <div class="containt">
        <div class="left">
            <?php
            $sql_count = "SELECT COUNT(subject_id) AS total_count FROM subjects"; // Replace 'id' with the column to count (usually primary key)
            $result_count = $conn->query($sql_count);

            if ($result_count->num_rows > 0) {
                $row = $result_count->fetch_assoc();
                $total_count = $row['total_count']; // This is the total number of rows in the table
            } else {
                $total_count = 0; // If no rows are found
            }

            // Display the total count
            echo "<label for='count'>Total count :" . $total_count . "</label>";
            ?>
        </div>
        <div class="right">
            <?php
            // Step 2: Display Search Form
            echo '<form method="GET" action="">
            <label for="search">Search by Name:</label>
            <input type="text" id="search" name="search" placeholder="Enter name or letter">
            <input type="submit" value="Search">
            </form>';

            // Step 3: Set up Search Query
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT * FROM subjects";

            if (!empty($searchTerm)) {
                // Modify query to filter by name that starts with or contains the search term
                $sql .= " WHERE subject_name LIKE '" . $conn->real_escape_string($searchTerm) . "%'";
            }



            ?>
        </div>
    </div>
    <?php
    $sql .= " ORDER BY subject_name ASC"; // Sort alphabetically
    $result = $conn->query($sql);
    // Step 3: Display Data in Table Format
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <br>
                   <br>
            <br>
            <br>
            <tr>
                <th>Subject Nme</th>
                <th>Subject Code</th>
                <th>Course</th>
                <th>Semester</th>
                <!-- Add more headers as per your table columns -->
            </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["subject_name"] . "</td>
                <td>" . $row["subject_code"] . "</td>
                <td>" . $row["course"] . "</td>
                <td>" . $row["semester"] . "</td>
                <!-- Add more columns as per your table -->
              </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>


    <!-- 
    <h3 class="heading1">C language: BCAC101</h3>
    <p class="para1"><b>Sem: 3</b></p>
    <p class="para2"><b>Course: BCA</b></p>
    <br>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Paper Title</th>
                    <th>Status</th>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>C programing.Question Paper set 1</td>
                    <td><span class="status-button pending">Pending</span></td>
                    <td><a href="../Student_Allpage/questiondetails.php" class="links">click here</a></td>
                </tr>

                <tr>
                    <td>Question Paper 2</td>
                    <td><span class="status-button attendant">Attended</span></td>
                    <td><a href="#link">click here</a></td>
                </tr>

                <tr>
                    <td>Question Paper 3</td>
                    <td><span class="status-button unattendant">Unattended</span></td>
                    <td><a href="#link">click here</a></td>
                </tr>

                <tr>
                    <td>Question Paper 4</td>
                    <td><span class="status-button unattendant">Unattended</span></td>
                    <td><a href="#link">click here</a></td>
                </tr>

                <tr>
                    <td>Question Paper 5</td>
                    <td><span class="status-button unattendant">Unattendant</span></td>
                    <td><a href="#link">click here</a></td>
                </tr>

                <tr>
                    <td>Question Paper 6</td>
                    <td><span class="status-button unattendant">Unattended</span></td>
                    <td><a href="#link">click here</a></td>
                </tr>
            </tbody>

        </table>
    </div> -->

</body>

</html>