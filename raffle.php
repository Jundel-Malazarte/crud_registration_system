<!DOCTYPE html>
<html lang="en">
<head>
    <title>Raffle</title>
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
        .winner-message {
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
        <h2 class="text-center mb-4">Raffle Draw</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Filter by Campus:</label><br>
                <input type="checkbox" name="campus[]" value="Main"> Main<br>
                <input type="checkbox" name="campus[]" value="Banilad"> Banilad<br>
                <input type="checkbox" name="campus[]" value="LM"> LM<br>
            </div>
            <button type="submit" class="btn btn-primary w3-button w3-blue">Reveal the Lucky Winner!</button>
        </form>

        <div class="table-container">
            <table class="table table-bordered table-hover w3-table-all mt-3">
                <thead class="w3-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Campus</th>
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

                    // Fetch participants from the database
                    $sql = "SELECT idNum, CONCAT(fname, ' ', lname) AS Name, campus FROM Registration $whereClause";
                    $result = $conn->query($sql);

                    $participants = [];
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $participants[] = $row;
                            echo "<tr>";
                            echo "<td>" . $row["idNum"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["campus"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>No participants found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($participants)) {
            // Select a random winner
            $winner = $participants[array_rand($participants)];
            echo "<div class='winner-message'>CONGRATULATIONS!! The Lucky Winner is: " . $winner['Name'] . " (ID: " . $winner['idNum'] . ") from " . $winner['campus'] . "!</div>";
        }
        ?>

    </div>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
