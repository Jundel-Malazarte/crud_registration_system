<?php
// Include database connection file
include 'db_conn.php';

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $idNum = $_GET['id'];

    // Prepare and execute the SQL statement to retrieve the student's current information
    $stmt = $conn->prepare("SELECT * FROM Registration WHERE idNum = ?");
    $stmt->bind_param("i", $idNum);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the student exists
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "Student not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="form-container w3-animate-opacity">
        <h2 class="text-center">Edit Student</h2>
        <form action="update_student.php" method="post">
            <input type="hidden" name="idNum" value="<?php echo $student['idNum']; ?>">
            <div class="form-group">
                <label for="campus">Campus</label>
                <input type="text" class="form-control" id="campus" name="campus" value="<?php echo $student['campus']; ?>" required>
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $student['fname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $student['lname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="amountPaid">Amount Paid</label>
                <input type="number" step="0.01" class="form-control" id="amountPaid" name="amountPaid" value="<?php echo $student['amountPaid']; ?>">
            </div>
            <div class="form-group">
                <label for="attended">Attended</label>
                <select class="form-control w3-select" id="attended" name="attended" required>
                    <option value="yes" <?php echo ($student['attended'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                    <option value="no" <?php echo ($student['attended'] == 'no') ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="register_table.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
