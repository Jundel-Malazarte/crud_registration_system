<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registered Students</title>
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
        .action-buttons .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">Registered Students</h2>
    <div class="text-right mb-3">
        <a href="registration.php" class="btn btn-primary w3-button w3-blue">Add Student</a>
        <a href="index.php" class="btn btn-primary w3-button w3-green">Back to menu</a>
    </div>

    <!-- message alert -->
    <?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
        <span><?php echo htmlspecialchars($_GET['message']); ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="table-container">
        <table class="table table-bordered table-hover w3-table-all">
            <thead class="w3-light-grey">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Campus</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    include 'db_conn.php'; // checking the connection

                    // Retrieve student records
                    $sql = "SELECT idNum, CONCAT(fname, ' ', lname) AS Name, campus, amountPaid FROM Registration";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["idNum"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["campus"] . "</td>";
                            echo "<td>Php " . number_format($row["amountPaid"], 2) . "</td>";
                            echo "<td class='action-buttons'>
                                <a href='edit_student.php?id=" . $row["idNum"] . "' class='btn btn-warning btn-sm w3-button w3-blue'>Edit</a>
                                <a href='delete_student.php?id=" . $row["idNum"] . "' class='btn btn-danger btn-sm w3-button w3-red' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No students registered.</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Include jQuery and Bootstrap JS -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
