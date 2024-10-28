<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <style>
        body {
            padding: 20px;
            background-color: #eceff1;
        }
        .table-container {
            margin-top: 20px;
        }

        button[type="submit"] {
            margin-top: 5px;
        }
        .badge-attended {
            background-color: #28a745; /* Green for Yes */
            color: #fff; 
            padding: 10px 15px; 
            border-radius: 5px;
        }
        .badge-not-attended {
            background-color: #dc3545; /* Red for No */
            color: #fff; 
            padding: 10px 15px; 
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Student Attendance</h2>
        
        <div class="text-right mb-3">
            <a href="index.php" class="btn btn-primary w3-button w3-green">Back to menu</a>
        </div>

        <form method="POST" action="">
            <div class="form-group">
                <label for="studentId">Input ID:</label>
                <input type="text" id="studentId" name="studentId" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w3-button w3-blue">Submit</button>
        </form>

        <div class="table-container">
            <table class="table table-bordered table-hover w3-table-all mt-5">
                <thead class="w3-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Campus</th>
                        <th>Amount</th>
                        <th>Attended</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db_conn.php'; // Include your database connection file

                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['studentId'])) {
                        $studentId = intval($_POST['studentId']); // Get the student ID from the form

                        // Prepare and execute the query to get student information including attendance
                        $sql = "SELECT idNum, CONCAT(fname, ' ', lname) AS Name, campus, amountPaid, attended FROM Registration WHERE idNum = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $studentId);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["idNum"] . "</td>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["campus"] . "</td>";
                                echo "<td>Php " . number_format($row["amountPaid"], 2) . "</td>";
                                
                                // Check attendance status
                                if ($row['attended'] == 'yes') {
                                    echo "<td><span class='badge badge-attended'>Yes</span></td>"; // Show attended status
                                } else {
                                    echo "<td><span class='badge badge-not-attended'>No</span></td>"; // Show not attended status
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No student found with this ID.</td></tr>";
                        }
                        
                        
                        $stmt->close(); // Close the statement
                    }
                    $conn->close(); // Close the database connection
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
