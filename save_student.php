<?php
include 'db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $idNum = intval($_POST['idNum']);
    $campus = $_POST['campus'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $amountPaid = floatval($_POST['amountPaid']);
    $attended = $_POST['attended']; // Get the attended value

    // Prepare the insert query
    $sql = "INSERT INTO Registration (idNum, campus, fname, lname, amountPaid, attended) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters: 
    // 'i' for integer (idNum)
    // 's' for string (campus, fname, lname)
    // 'd' for double (amountPaid)
    // 's' for string (attended)
    $stmt->bind_param("issdss", $idNum, $campus, $fname, $lname, $amountPaid, $attended);
    
    if ($stmt->execute()) {
        // Redirect or show success message
        header("Location: register_table.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the statement
}
$conn->close(); // Close the database connection
?>
