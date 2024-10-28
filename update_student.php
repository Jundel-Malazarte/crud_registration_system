<?php
// Include database connection file
include 'db_conn.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $idNum = $_POST['idNum'];
    $campus = $_POST['campus'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $amountPaid = $_POST['amountPaid'];
    $attended = $_POST['attended'];

    // Prepare and execute the SQL statement to update the student's information
    $sql = "UPDATE Registration SET campus=?, fname=?, lname=?, amountPaid=?, attended=? WHERE idNum=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdsi", $campus, $fname, $lname, $amountPaid, $attended, $idNum);

    if ($stmt->execute()) {
        // Redirect to registertable.php after successful update
        header("Location: register_table.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
