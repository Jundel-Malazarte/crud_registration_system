<!DOCTYPE html>
<html lang="en">
<head>
    <title>Summary Report</title>
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
        h2, h3 {
            text-align: center;
        }
        .total-row {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Summary Report</h2>
        <h3>(ALL CAMPUS)</h3>
        
        <div class="text-right mb-3">
            <a href="index.php" class="btn btn-primary w3-button w3-blue">Back to menu</a>
        </div>

        <div class="table-container">
            <table class="table table-bordered table-hover w3-table-all mt-3">
                <thead class="w3-white">
                    <tr>
                        <th>Campus</th>
                        <th>Registered</th>
                        <th>Attended</th>
                        <th>Total Collection</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db_conn.php'; // Include your database connection file

                    // Prepare the SQL query to get the summary data
                    $sql = "SELECT campus, 
                                   COUNT(*) AS registered, 
                                   SUM(CASE WHEN attended = 'yes' THEN 1 ELSE 0 END) AS attended, 
                                   SUM(amountPaid) AS total_collection 
                            FROM Registration 
                            GROUP BY campus";

                    $result = $conn->query($sql);
                    $totalRegistered = 0;
                    $totalAttended = 0;
                    $totalCollection = 0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["campus"]) . "</td>"; // Sanitize output
                            echo "<td>" . htmlspecialchars($row["registered"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["attended"]) . "</td>";
                            echo "<td>" . number_format($row["total_collection"], 2) . "</td>";
                            echo "</tr>";

                            // Accumulate totals
                            $totalRegistered += $row["registered"];
                            $totalAttended += $row["attended"];
                            $totalCollection += $row["total_collection"];
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No data found.</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr class="total-row">
                        <td>Total</td>
                        <td><?php echo $totalRegistered; ?></td>
                        <td><?php echo $totalAttended; ?></td>
                        <td><?php echo number_format($totalCollection, 2); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
