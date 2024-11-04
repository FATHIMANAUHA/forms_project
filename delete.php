<?php
// Include the database connection
include 'config.php';

// Check if the 'id' is set in the URL (GET request)
if (isset($_GET['id'])) {
    // Sanitize the input to ensure it's an integer
    $id = intval($_GET['id']);

    // Prepare the delete query
    $sql = "DELETE FROM entries WHERE Id = ?";

    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id); // 'i' indicates that the parameter is an integer
        
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect with a success message
            header("Location: index.php?message=Record+deleted+successfully");
            exit();
        } else {
            // Error deleting record
            echo "Error deleting record: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
