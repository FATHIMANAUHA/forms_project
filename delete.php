<?php
include 'config.php'; // Include database connection

if (isset($_GET['sl_no'])) {
    $sl_no = $_GET['sl_no'];

    // Delete query based on SL No
    $sql = "DELETE FROM entries WHERE Sl_no = ?";
    
    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sl_no); // 'i' for integer
    $stmt->execute();

    // Redirect back to the main page after deletion
    header("Location: index.php");
    exit();
} else {
    // If no SL No is provided, redirect back to the main page
    header("Location: index.php");
    exit();
}
?>
