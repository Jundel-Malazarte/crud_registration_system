<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report</title>
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
        .report-message {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Generate Report</h2>
        
        <div class="text-right mb-3">
            <a href="index.php" class="btn btn-primary w3-button w3-blue">Back to menu</a>
        </div>

        <form method="POST" action="">
            <div class="form-group">
                <label>Filter by Campus:</label><br>
                <input type="checkbox" name="campus[]" value="Main"> Main<br>
                <input type="checkbox" name="campus[]" value="Banilad"> Banilad<br>
                <input type="checkbox" name="campus[]" value="LM"> LM<br>
            </div>
            <button type="submit" class="btn btn-primary w3-button w3-blue">Generate Report</button>
        </form>

        <div class="table-container">
            <table class="table table-bordered table-hover w3-table-all mt-3">
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

                    $campusFilter = isset($_POST['campus']) ? $_POST['campus'] : [];

                    // Prepare the SQL query based on selected campuses
                    $campusConditions = [];
                    if (!empty($campusFilter)) {
                        foreach ($campusFilter as $campus) {
                            $campusConditions[] = "campus = '" . $conn->real_escape_string($campus) . "'";
                        }
                    }
                    $whereClause = !empty($campusConditions) ? "WHERE " . implode(' OR ', $campusConditions) : '';

                    // Fetch student details from the database
                    $sql = "SELECT idNum, CONCAT(fname, ' ', lname) AS Name, campus, amountPaid, attended FROM Registration $whereClause";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["idNum"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["campus"] . "</td>";
                            echo "<td>Php " . number_format($row["amountPaid"], 2) . "</td>";
                            echo "<td>" . ($row["attended"] === 'yes' ? 'Yes' : 'No') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No records found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
