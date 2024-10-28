<?php
include 'db_conn.php'; // Include your database connection file

// Check if the id parameter is set
if (isset($_GET['id'])) {
    $idNum = intval($_GET['id']); // Get the ID from the URL and convert it to an integer

    // Prepare and execute the delete query
    $sql = "DELETE FROM Registration WHERE idNum = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $idNum); // Bind the parameter
        if ($stmt->execute()) {
            // Successfully deleted
            header("Location: register_table.php?message=Student deleted successfully");
            exit();
        } else {
            // Error executing the query
            echo "Error deleting record: " . $stmt->error;
        }
    } else {
        // Error preparing the statement
        echo "Error preparing statement: " . $conn->error;
    }

    $stmt->close();
} else {
    // No ID specified
    echo "No student ID specified.";
}

// Close the database connection
$conn->close();
?>
