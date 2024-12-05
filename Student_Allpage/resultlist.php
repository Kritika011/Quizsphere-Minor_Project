<?php
include '../Navber/nav.php';
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../Home_page/index.php");
//     exit;
// }

include '../config.php'; // Include the database connection

// Fetch result details
$student_id = $_SESSION['user_id']; // Get the logged-in student ID

// Query to fetch the results with paper title
$result_query = "
    SELECT 
        r.*, 
        pd.paper_id, 
        CONCAT(s.subject_name, ' - Question Paper Set ', pd.paper_id) AS papertitle
    FROM 
        results r
    JOIN 
        paperdetails pd ON r.paper_id = pd.paper_id
    JOIN 
        subjects s ON pd.subject_id = s.subject_id
    WHERE 
        r.student_id = '$student_id'
";
$result_data = mysqli_query($conn, $result_query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="../Navber/style.css">
    <?php

    ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #333;
            /* padding: 20px; */
        }



        * {
            margin: 0;
            padding: 0;
            font: 1em;
        }

        body {
            background-color: #333;
            color: #ffffff;
        }

        .heading1 {
            text-align: center;
            margin-top: 15px;
        }

        .para1 {
            float: left;
            padding-left: 40%;
            margin-top: 15px;
            font-size: 18px;
            font-weight: 30px;
        }

        .para2 {
            float: right;
            padding-right: 40%;
            margin-top: 15px;
            font-size: 18px;
            font-weight: 30px;
        }

        .content {
            margin-top: 3vw;
        }

        table {
            margin: auto;
            padding: auto;
            border-collapse: collapse;
            background-color: #222;
            /* border-radius: 10px; */
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.633);
            width: 70%;
            text-align: center;
            align-items: center;
            margin-top: 30px;
        }

        th {
            padding: 10px;
            text-align: center;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table,
        th,
        td {
            border: 1px solid rgba(255, 255, 255, 0.845);
        }
    </style>
</head>





<!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .result-box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

    

        .details {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .score {
            font-size: 22px;
            color: green;
            font-weight: bold;
        }

        .incorrect {
            font-size: 18px;
            color: red;
        }

        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #28a745;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .no-results {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head> -->

<body>

    <h2>Exam Results</h2>

    <?php if (mysqli_num_rows($result_data) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Paper Title</th>
                    <th>Total Questions</th>
                    <th>Correct Answers</th>
                    <th>Total Attended</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_data)): ?>
                    <tr>
                        <td><?php echo $row['papertitle']; ?></td>
                        <td><?php echo $row['total_questions']; ?></td>
                        <td><?php echo $row['correct_answers']; ?></td>
                        <td><?php echo $row['total_attended']; ?></td>
                        <td><?php echo $row['score']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-results">No results available for your account.</p>
    <?php endif; ?>

    <!-- <a href="index.php" class="button">Go to Home</a> -->

</body>

</html>